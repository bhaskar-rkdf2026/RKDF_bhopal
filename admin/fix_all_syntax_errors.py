import os, glob, re

root = os.path.abspath(os.path.join(os.path.dirname(__file__), '..'))
php_files = glob.glob(os.path.join(root, '*.php'))

fixed_count = 0

for filepath in php_files:
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()

    orig = content

    # Fix <?php </div> </section> syntax errors at end of file
    bad_pattern = r'<\?php\s*</div>\s*</section>.*?</body>\s*</html>'
    replacement = "    </div>\n  </section>\n\n  <!-- APPROVED FOOTER -->\n  <?php include __DIR__ . '/include/footer.php'; ?>\n\n</body>\n</html>"

    content = re.sub(bad_pattern, replacement, content, flags=re.DOTALL)

    # Clean double footers
    double_footer = r'(<!-- APPROVED FOOTER -->\s*<\?php include __DIR__ \. \'/include/footer\.php\'; \?>\s*){2,}'
    content = re.sub(double_footer, "<!-- APPROVED FOOTER -->\n  <?php include __DIR__ . '/include/footer.php'; ?>\n", content)

    if content != orig:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        fixed_count += 1

print(f"OK: Fixed syntax errors in {fixed_count} PHP files!")
