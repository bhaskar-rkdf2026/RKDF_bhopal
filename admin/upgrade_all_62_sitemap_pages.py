import os, glob, re

root = os.path.abspath(os.path.join(os.path.dirname(__file__), '..'))

# System files to keep as-is
skip_files = [
    'index.php', 'new_navbar.php', 'footer.php', 'site_settings.php', 'db.php',
    'login.php', 'logout.php', 'manage_appearance.php', 'manage_pages.php',
    'manage_sections.php', 'manage_settings.php', 'manage_subpages.php',
    'subpage_template.php', 'sitemap.php'
]

# Read sitemap URL list
url_file = os.path.join(root, 'sitemap_php_urls.txt')
urls = []
if os.path.exists(url_file):
    with open(url_file, 'r', encoding='utf-8') as f:
        for line in f:
            line = line.strip()
            if line and line.endswith('.php'):
                rel_path = line.replace('https://www.rkdf.ac.in/', '').replace('terms&amp;condition.php', 'terms&condition.php')
                urls.append(rel_path)

# Also get all root PHP files
all_root_phps = [os.path.basename(p) for p in glob.glob(os.path.join(root, '*.php'))]
target_files = list(set(urls + all_root_phps))

processed_count = 0

for rel in target_files:
    if rel in skip_files or '-202' in rel or '-201' in rel or 'Backup' in rel:
        continue

    file_path = os.path.join(root, rel)
    if not os.path.exists(file_path):
        continue

    with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
        raw = f.read()

    # Skip non-HTML files
    if '<html' not in raw.lower() and '<section' not in raw.lower() and '<div' not in raw.lower():
        continue

    # Extract title
    page_title = 'RKDF University Bhopal'
    tm = re.search(r'<title>(.*?)</title>', raw, re.IGNORECASE | re.DOTALL)
    if tm:
        t_str = tm.group(1).strip()
        t_str = re.sub(r'<.*?>', '', t_str)
        t_str = t_str.replace('RKDF UNIVERSITY | ', '').replace('RKDF University | ', '').replace('RKDF UNIVERSITY - ', '').strip()
        if t_str:
            page_title = t_str

    if page_title == 'RKDF University Bhopal' or not page_title:
        base_name = os.path.splitext(os.path.basename(file_path))[0]
        page_title = base_name.replace('_', ' ').replace('-', ' ').title()

    # Extract pure inner content between old header and footer
    # Find start after old header
    start_pos = 0
    m_head = re.search(r'</header>', raw, re.IGNORECASE)
    if m_head:
        start_pos = m_head.end()
        # skip comment <!--- header -->
        m_comm = re.match(r'^\s*<!---\s*header\s*-->', raw[start_pos:], re.IGNORECASE)
        if m_comm:
            start_pos += len(m_comm.group(0))
    else:
        m_inc = re.search(r'include\s+[\'"]include/(menu|header|topmenu)\.php[\'"];?', raw, re.IGNORECASE)
        if m_inc:
            start_pos = m_inc.end()
        else:
            m_body = re.search(r'<body.*?>', raw, re.IGNORECASE)
            if m_body:
                start_pos = m_body.end()

    # Find end before old footer
    end_pos = len(raw)
    m_foot = re.search(r'<\?php\s*include\s+[\'"]include/footer\.php[\'"];?\s*\?>', raw, re.IGNORECASE)
    if m_foot:
        end_pos = m_foot.start()
    else:
        m_foot_tag = re.search(r'<footer', raw, re.IGNORECASE)
        if m_foot_tag:
            end_pos = m_foot_tag.start()
        else:
            m_body_end = re.search(r'</body>', raw, re.IGNORECASE)
            if m_body_end:
                end_pos = m_body_end.start()

    inner_content = raw[start_pos:end_pos] if end_pos > start_pos else raw

    # Clean out inner new_navbar, subpage-hero, or footer if accidentally present in inner_content
    inner_content = re.sub(r'<\?php\s*require_once\s+__DIR__\s*\.\s*[\'"]/include/(site_settings|config/db)\.php[\'"];?\s*\?>', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'<\?php\s*include\s+__DIR__\s*\.\s*[\'"]/include/new_navbar\.php[\'"];?\s*\?>', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'<!-- APPROVED NAVBAR -->', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'<!-- HERO SECTION -->\s*<section class="subpage-hero">.*?</section>', '', inner_content, flags=re.IGNORECASE | re.DOTALL)
    inner_content = re.sub(r'<!-- MAIN CONTENT SECTION.*?<section class="sp-main-box">\s*<div class="rk-container">', '', inner_content, flags=re.IGNORECASE | re.DOTALL)
    inner_content = re.sub(r'<\?php\s*include\s+__DIR__\s*\.\s*[\'"]/include/footer\.php[\'"];?\s*\?>', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'<!-- APPROVED FOOTER -->', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'<!DOCTYPE.*?>', '', inner_content, flags=re.IGNORECASE | re.DOTALL)
    inner_content = re.sub(r'<html.*?>', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'<head.*?>.*?</head>', '', inner_content, flags=re.IGNORECASE | re.DOTALL)
    inner_content = re.sub(r'<body.*?>', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'</body>', '', inner_content, flags=re.IGNORECASE)
    inner_content = re.sub(r'</html>', '', inner_content, flags=re.IGNORECASE)

    # Reconstruct pristine page
    clean_code  = "<?php\n"
    clean_code += "require_once __DIR__ . '/include/site_settings.php';\n"
    clean_code += "require_once __DIR__ . '/config/db.php';\n"
    clean_code += "?>\n"
    clean_code += "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n"
    clean_code += "  <meta charset=\"UTF-8\">\n"
    clean_code += "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n"
    clean_code += "  <title>" + page_title + " — RKDF University Bhopal</title>\n"
    clean_code += "  <link rel=\"stylesheet\" href=\"css/rkdf-home.css\">\n"
    clean_code += "  <style>\n"
    clean_code += "    .subpage-hero {\n"
    clean_code += "      position: relative;\n"
    clean_code += "      padding: 160px 0 90px;\n"
    clean_code += "      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), \n"
    clean_code += "                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;\n"
    clean_code += "      color: var(--p-paper);\n"
    clean_code += "      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box {\n"
    clean_code += "      padding: 80px 0;\n"
    clean_code += "      background: var(--p-paper);\n"
    clean_code += "      color: var(--p-navy-deep);\n"
    clean_code += "      font-size: 16px;\n"
    clean_code += "      line-height: 1.8;\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box table {\n"
    clean_code += "      width: 100%;\n"
    clean_code += "      border-collapse: collapse;\n"
    clean_code += "      margin: 28px 0;\n"
    clean_code += "      background: #ffffff;\n"
    clean_code += "      border-radius: 12px;\n"
    clean_code += "      overflow: hidden;\n"
    clean_code += "      box-shadow: 0 4px 16px rgba(12,20,36,0.04);\n"
    clean_code += "      border: 1px solid var(--p-hairline);\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box th {\n"
    clean_code += "      background: var(--p-navy-deep);\n"
    clean_code += "      color: #ffffff;\n"
    clean_code += "      padding: 16px 20px;\n"
    clean_code += "      font-family: var(--p-font-mono);\n"
    clean_code += "      font-size: 13.5px;\n"
    clean_code += "      text-transform: uppercase;\n"
    clean_code += "      letter-spacing: 0.05em;\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box td {\n"
    clean_code += "      padding: 16px 20px;\n"
    clean_code += "      border-bottom: 1px solid var(--p-hairline);\n"
    clean_code += "      font-size: 15px;\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box tr:hover td {\n"
    clean_code += "      background: rgba(220,38,38,0.03);\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box a {\n"
    clean_code += "      color: var(--p-gold);\n"
    clean_code += "      font-weight: 700;\n"
    clean_code += "      text-decoration: none;\n"
    clean_code += "      transition: color 0.2s;\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box a:hover {\n"
    clean_code += "      text-decoration: underline;\n"
    clean_code += "      color: #b91c1c;\n"
    clean_code += "    }\n"
    clean_code += "    .sp-main-box img {\n"
    clean_code += "      max-width: 100%;\n"
    clean_code += "      height: auto;\n"
    clean_code += "      border-radius: 12px;\n"
    clean_code += "      object-fit: contain;\n"
    clean_code += "    }\n"
    clean_code += "    .glossymenu a.menuitem {\n"
    clean_code += "      display: inline-block;\n"
    clean_code += "      padding: 10px 18px;\n"
    clean_code += "      margin: 4px;\n"
    clean_code += "      background: #ffffff;\n"
    clean_code += "      border: 1px solid var(--p-hairline);\n"
    clean_code += "      border-radius: 8px;\n"
    clean_code += "      color: var(--p-navy-deep);\n"
    clean_code += "      font-weight: 700;\n"
    clean_code += "      text-decoration: none;\n"
    clean_code += "      transition: all 0.25s;\n"
    clean_code += "    }\n"
    clean_code += "    .glossymenu a.menuitem:hover {\n"
    clean_code += "      background: var(--p-gold);\n"
    clean_code += "      color: #ffffff;\n"
    clean_code += "      border-color: var(--p-gold);\n"
    clean_code += "    }\n"
    clean_code += "  </style>\n"
    clean_code += "</head>\n<body>\n"
    clean_code += "  <!-- APPROVED NAVBAR -->\n"
    clean_code += "  <?php include __DIR__ . '/include/new_navbar.php'; ?>\n\n"
    clean_code += "  <!-- HERO SECTION -->\n"
    clean_code += "  <section class=\"subpage-hero\">\n"
    clean_code += "    <div class=\"rk-container\">\n"
    clean_code += "      <span class=\"rk-eyebrow tone-gold\">RKDF University Bhopal</span>\n"
    clean_code += "      <h1 class=\"rk-h1\" style=\"font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;\">" + page_title + "</h1>\n"
    clean_code += "    </div>\n"
    clean_code += "  </section>\n\n"
    clean_code += "  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->\n"
    clean_code += "  <section class=\"sp-main-box\">\n"
    clean_code += "    <div class=\"rk-container\">\n"
    clean_code += inner_content.strip() + "\n"
    clean_code += "    </div>\n"
    clean_code += "  </section>\n\n"
    clean_code += "  <!-- APPROVED FOOTER -->\n"
    clean_code += "  <?php include __DIR__ . '/include/footer.php'; ?>\n\n"
    clean_code += "</body>\n</html>\n"

    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(clean_code)

    processed_count += 1

print(f"OK: Processed and upgraded {processed_count} pages with exact 1 navbar and 1 footer!")
