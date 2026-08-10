<?php
// RKDF University — Footer (v4 — Prototype Exact Match)
require_once __DIR__ . '/site_settings.php';
$footAddr = htmlspecialchars(get_site_setting('footer_address', 'Airport Bypass Road, Gandhi Nagar, Bhopal, Madhya Pradesh 462033'));
$footPhone = htmlspecialchars(get_site_setting('footer_phone', '+91 755 2751 000'));
$footEmail = htmlspecialchars(get_site_setting('footer_email', 'admissions@rkdf.ac.in'));
$socFb     = htmlspecialchars(get_site_setting('social_facebook',  'https://www.facebook.com/rkdfuniversitybhopal/'));
$socTw     = htmlspecialchars(get_site_setting('social_twitter',   'https://x.com/rkdfuniversity'));
$socInsta  = htmlspecialchars(get_site_setting('social_instagram', 'https://www.instagram.com/rkdfuniversitybhopal/'));
$socLnkd   = htmlspecialchars(get_site_setting('social_linkedin',  'https://www.linkedin.com/school/rkdf-university-bhopal/'));
$socYt     = htmlspecialchars(get_site_setting('social_youtube',   'https://www.youtube.com/@rkdfuniversitybhopal'));
$copyYear  = date('Y');
?>

<!-- ══════════════════════════════════════════════════════════
  FOOTER — Prototype Exact Match (navy-deep bg)
══════════════════════════════════════════════════════════ -->
<footer class="rk-footer" id="rk-footer">
  <div class="rk-container">

    <!-- Top grid: Brand + 4 link columns -->
    <div class="rk-footer-top">

      <!-- Brand column -->
      <div class="rk-footer-brand">
        <div class="rk-footer-logo-wrap">
          <img src="images/lovable/rkdf-logo.png" alt="RKDF University" class="rk-footer-logo">
          <div>
            <div class="rk-footer-brand-name">RKDF University</div>
            <div class="rk-footer-brand-loc">Bhopal, MP</div>
          </div>
        </div>
        <p class="rk-footer-desc">
          A globally minded, research-driven university committed to accessible, quality higher
          education across central India and beyond.
        </p>
        <div class="rk-footer-social">
          <a href="<?= $socFb ?>" target="_blank" rel="noopener" class="rk-footer-social-link" aria-label="Facebook">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
          </a>
          <a href="<?= $socTw ?>" target="_blank" rel="noopener" class="rk-footer-social-link" aria-label="Twitter/X">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4l16 16M20 4 4 20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/></svg>
          </a>
          <a href="<?= $socInsta ?>" target="_blank" rel="noopener" class="rk-footer-social-link" aria-label="Instagram">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
          </a>
          <a href="<?= $socLnkd ?>" target="_blank" rel="noopener" class="rk-footer-social-link" aria-label="LinkedIn">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="<?= $socYt ?>" target="_blank" rel="noopener" class="rk-footer-social-link" aria-label="YouTube">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white"/></svg>
          </a>
        </div>
      </div>

      <!-- University links -->
      <div>
        <div class="rk-footer-col-head">University</div>
        <ul class="rk-footer-col-links">
          <li><a href="About_Us.pdf" target="_blank">About RKDF</a></li>
          <li><a href="Chancellor.php">Chancellor's Desk</a></li>
          <li><a href="Vice-Chancellor-Desk.php">Vice Chancellor</a></li>
          <li><a href="Governingbody.php">Leadership</a></li>
          <li><a href="Careers.php">Careers</a></li>
        </ul>
      </div>

      <!-- Admissions links -->
      <div>
        <div class="rk-footer-col-head">Admissions</div>
        <ul class="rk-footer-col-links">
          <li><a href="admissionform.php">Apply Online</a></li>
          <li><a href="academic&departments.php">Programs</a></li>
          <li><a href="University_Fees_Structure.pdf" target="_blank">Fee Structure</a></li>
          <li><a href="scholarship.php">Scholarships</a></li>
          <li><a href="foreign_stud/index.html" target="_blank">International</a></li>
        </ul>
      </div>

      <!-- Academics links -->
      <div>
        <div class="rk-footer-col-head">Academics</div>
        <ul class="rk-footer-col-links">
          <li><a href="academic&departments.php">Schools</a></li>
          <li><a href="academic&departments.php">Departments</a></li>
          <li><a href="r&d.php">Research</a></li>
          <li><a href="Library.php">Library</a></li>
          <li><a href="acadmiccalander.php">Calendar</a></li>
        </ul>
      </div>

      <!-- Resources links -->
      <div>
        <div class="rk-footer-col-head">Resources</div>
        <ul class="rk-footer-col-links">
          <li><a href="https://erplive.rkdf.ac.in/" target="_blank">Student Portal</a></li>
          <li><a href="Announcements.php">Downloads</a></li>
          <li><a href="Result.php">Results</a></li>
          <li><a href="alumni.php">Alumni</a></li>
          <li><a href="contact-us.php#emergency">Emergency</a></li>
        </ul>
      </div>
    </div><!-- /rk-footer-top -->

    <!-- Contact row -->
    <div class="rk-footer-contact">
      <!-- Address -->
      <div class="rk-footer-contact-item">
        <span class="rk-footer-contact-icon">📍</span>
        <div>
          <div class="rk-footer-contact-label">Campus</div>
          <div class="rk-footer-contact-val"><?= $footAddr ?></div>
        </div>
      </div>

      <!-- Phone -->
      <div class="rk-footer-contact-item">
        <span class="rk-footer-contact-icon">📞</span>
        <div>
          <div class="rk-footer-contact-label">Admissions</div>
          <div class="rk-footer-contact-val"><?= $footPhone ?></div>
          <div style="font-size:12px;color:rgba(250,249,246,0.5);margin-top:4px;">Emergency · 1800 200 2233</div>
        </div>
      </div>

      <!-- Email + newsletter -->
      <div class="rk-footer-contact-item">
        <span class="rk-footer-contact-icon">✉️</span>
        <div>
          <div class="rk-footer-contact-label">Enquiries</div>
          <div class="rk-footer-contact-val"><?= $footEmail ?></div>
          <form class="rk-footer-newsletter" onsubmit="return false;">
            <input type="email" placeholder="Newsletter email" aria-label="Email for newsletter">
            <button type="submit">Join</button>
          </form>
        </div>
      </div>
    </div><!-- /rk-footer-contact -->

    <!-- Bottom: copyright + legal -->
    <div class="rk-footer-bottom">
      <div class="rk-footer-copy">© <?= $copyYear ?> RKDF University · All rights reserved</div>
      <div class="rk-footer-legal">
        <a href="privacy.php">Privacy</a>
        <a href="terms&condition.php">Terms</a>
        <a href="policies.php#accessibility">Accessibility</a>
        <a href="sitemap.php">Sitemap</a>
      </div>
    </div>

  </div><!-- /rk-container -->
</footer>
