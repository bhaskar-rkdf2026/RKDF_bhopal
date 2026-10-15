<?php
// ============================================================
// RKDF University — Split-View Featured Milestone & Notice Popup Component
// Controlled via Admin Panel Site Settings (popup_notice_active)
// ============================================================
require_once __DIR__ . '/site_settings.php';

$popupActive = (int)get_site_setting('popup_notice_active', 1);
if (!$popupActive) {
    return;
}

$popupTitle = htmlspecialchars(get_site_setting('popup_notice_title', 'Important Notices & Results'));
?>

<!-- ── SPLIT-VIEW NOTICE POPUP MODAL DIALOG (Delayed Polite Load) ── -->
<div class="rkdf-notice-modal-overlay" id="rkdfNoticeOverlay" aria-modal="true" role="dialog" style="display:none;">
  <div class="rkdf-notice-modal-card">

    <!-- ══ LEFT PANEL: STAR MILESTONE / FEATURED POST ══ -->
    <div class="rkdf-popup-left-panel">
      <!-- Milestone Tag Pill -->
      <div class="rkdf-popup-milestone-pill">
        <span class="rkdf-milestone-star">★</span>
        <span class="rkdf-milestone-tag">STAR MILESTONE • AMAZON AWS</span>
      </div>

      <!-- Poster Frame -->
      <div class="rkdf-popup-poster-card">
        <img src="images/rkdf_milestone_poster.jpg" alt="Aman Sharma - Placed at Amazon AWS (₹44.5 LPA) - RKDF University" class="rkdf-popup-poster-img" loading="eager">
      </div>

      <!-- Post Caption -->
      <p class="rkdf-popup-poster-caption">
        Aman Sharma (B.Tech CSE) selected as Software Development Engineer at <strong>Amazon AWS</strong> with a record package of <strong>₹44.5 LPA</strong>.
      </p>

      <!-- Action Button -->
      <a href="news_media.php" class="rkdf-popup-post-btn">
        <span class="rkdf-post-btn-label">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px;"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
          Read Placement Coverage
        </span>
        <span class="rkdf-post-btn-arrow">→</span>
      </a>
    </div>

    <!-- ══ RIGHT PANEL: NOTICES & CIRCULARS LIST ══ -->
    <div class="rkdf-popup-right-panel">

      <!-- Header Strip -->
      <div class="rkdf-notice-header">
        <div class="rkdf-notice-title-wrap">
          <div class="rkdf-notice-bell-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="1.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          </div>
          <div>
            <h3 class="rkdf-notice-h3"><?= $popupTitle ?></h3>
            <div class="rkdf-notice-sub">Official circulars &amp; declared semester examination updates</div>
          </div>
        </div>
        <button type="button" class="rkdf-notice-close-btn" id="rkdfNoticeClose" aria-label="Close Notice Popup">✕</button>
      </div>

      <!-- Scrollable Notice List Body -->
      <div class="rkdf-notice-body">
        
        <!-- Notice Item 1 -->
        <div class="rkdf-notice-item highlight-red">
          <div class="rkdf-notice-tag tag-red">CONVOCATION JUNE 2026</div>
          <a href="Convocation.php" class="rkdf-notice-link">
            <strong>🎓 RKDF University 15th Annual Convocation June 2026</strong>
          </a>
        </div>

        <!-- Notice Item 2 -->
        <div class="rkdf-notice-item highlight-blue">
          <div class="rkdf-notice-tag tag-blue">EXAMINATION NOTICE</div>
          <a href="Exam_Notice.php" class="rkdf-notice-link">
            <strong>📌 Examination Circulars &amp; Revised Datesheets</strong>
          </a>
        </div>

        <!-- Notice Item 3 -->
        <div class="rkdf-notice-item highlight-gold">
          <div class="rkdf-notice-tag tag-gold">WALK-IN INTERVIEW · RECRUITMENT</div>
          <a href="Careers.php" class="rkdf-notice-link">
            <strong>💼 Faculty Openings &amp; Research Project Positions</strong>
          </a>
        </div>

        <!-- Notice Item 4 -->
        <div class="rkdf-notice-item highlight-green">
          <div class="rkdf-notice-tag tag-green">PH.D ADMISSIONS 2026</div>
          <a href="phd_entrance.php" class="rkdf-notice-link">
            <strong>🔬 Ph.D Entrance Examination 2026 Notification</strong>
          </a>
        </div>

        <!-- Notice Item 5 -->
        <div class="rkdf-notice-item highlight-purple">
          <div class="rkdf-notice-tag tag-purple">ACCREDITATION</div>
          <a href="public-disclosure.php" class="rkdf-notice-link">
            <strong>🏅 NAAC Certificate of Accreditation &amp; Statutory Approvals</strong>
          </a>
        </div>

        <!-- Notice Item 6 -->
        <div class="rkdf-notice-item highlight-teal">
          <div class="rkdf-notice-tag tag-teal">RESULT NOTIFICATION</div>
          <a href="Result.php" class="rkdf-notice-link">
            <strong>📖 Declared Semester Examination Results &amp; Marksheets</strong>
          </a>
        </div>

      </div><!-- /rkdf-notice-body -->

      <!-- Footer Action Bar -->
      <div class="rkdf-notice-footer">
        <label class="rkdf-notice-dontshow">
          <input type="checkbox" id="rkdfNoticeDontShow">
          <span>Don't show again today</span>
        </label>
        <div class="rkdf-notice-ft-actions">
          <a href="Result.php" class="rkdf-btn-all-notices">View Results ↗</a>
          <button type="button" class="rkdf-btn-dismiss" id="rkdfNoticeDismissBtn">Got it, Close</button>
        </div>
      </div>

    </div><!-- /rkdf-popup-right-panel -->

  </div><!-- /rkdf-notice-modal-card -->
</div><!-- /rkdf-notice-modal-overlay -->

<style>
/* ── Overlay Backdrop ── */
.rkdf-notice-modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(8, 14, 26, 0.82);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  z-index: 99999999;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 16px;
  animation: rkdfNoticeFadeIn 0.3s ease-out;
}
@keyframes rkdfNoticeFadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

/* ── Modal Dialog Shell ── */
.rkdf-notice-modal-card {
  background: #ffffff;
  border-radius: 16px;
  max-width: 940px;
  width: 100%;
  box-shadow: 0 28px 70px rgba(0, 0, 0, 0.55), 0 0 0 1px rgba(255, 255, 255, 0.08);
  overflow: hidden;
  display: flex;
  flex-direction: row;
  border: 1px solid rgba(255, 255, 255, 0.12);
  animation: rkdfNoticePop 0.35s cubic-bezier(0.19, 1, 0.22, 1);
}
@keyframes rkdfNoticePop {
  from { opacity: 0; transform: scale(0.93) translateY(14px); }
  to { opacity: 1; transform: scale(1) translateY(0); }
}

/* ══════════════════════════════════════════════
   LEFT PANEL (Dark Blue Milestone & Poster)
   ══════════════════════════════════════════════ */
.rkdf-popup-left-panel {
  width: 360px;
  min-width: 360px;
  background: linear-gradient(170deg, #070d19 0%, #0c1424 55%, #111a30 100%);
  color: #ffffff;
  padding: 22px 20px 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-right: 1px solid rgba(255, 255, 255, 0.08);
  position: relative;
}

/* Milestone Tag Pill */
.rkdf-popup-milestone-pill {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: rgba(255, 184, 0, 0.12);
  border: 1px solid rgba(255, 184, 0, 0.35);
  border-radius: 20px;
  padding: 5px 12px;
  align-self: flex-start;
  margin-bottom: 14px;
}
.rkdf-milestone-star {
  color: #FFB800;
  font-size: 13px;
  line-height: 1;
}
.rkdf-milestone-tag {
  color: #FFD15C;
  font-family: 'JetBrains Mono', ui-monospace, monospace;
  font-size: 10.5px;
  font-weight: 700;
  letter-spacing: 0.07em;
  text-transform: uppercase;
}

/* Poster Card Frame */
.rkdf-popup-poster-card {
  width: 100%;
  aspect-ratio: 1 / 1;
  background: #000000;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.14);
  box-shadow: 0 10px 26px rgba(0, 0, 0, 0.45);
  display: flex;
  align-items: center;
  justify-content: center;
}
.rkdf-popup-poster-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 25%;
  transform: scale(1.22);
  display: block;
}

/* Caption Text */
.rkdf-popup-poster-caption {
  font-size: 12.5px;
  line-height: 1.45;
  color: #cbd5e1;
  margin: 12px 0 14px;
}
.rkdf-popup-poster-caption strong {
  color: #ffffff;
  font-weight: 700;
}

/* Yellow / Gold Post CTA Button */
.rkdf-popup-post-btn {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  padding: 12px 16px;
  border-radius: 10px;
  background: #FFB800;
  color: #0c1424 !important;
  font-weight: 800;
  font-size: 13px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 4px 14px rgba(255, 184, 0, 0.32);
}
.rkdf-post-btn-left {
  display: inline-flex;
  align-items: center;
  letter-spacing: 0.02em;
}
.rkdf-post-btn-arrow {
  font-size: 15px;
  font-weight: 800;
  transition: transform 0.25s ease;
}
.rkdf-popup-post-btn:hover {
  background: #E5A500;
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(255, 184, 0, 0.42);
}
.rkdf-popup-post-btn:hover .rkdf-post-btn-arrow {
  transform: translateX(4px);
}

/* ══════════════════════════════════════════════
   RIGHT PANEL (Notices & Results List)
   ══════════════════════════════════════════════ */
.rkdf-popup-right-panel {
  flex: 1;
  display: flex;
  flex-direction: column;
  background: #ffffff;
  min-width: 0;
}

/* Header */
.rkdf-notice-header {
  background: #0c1424;
  color: #ffffff;
  padding: 18px 22px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 2px solid #E31B23;
}
.rkdf-notice-title-wrap {
  display: flex;
  align-items: center;
  gap: 12px;
}
.rkdf-notice-bell-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.06);
}
.rkdf-notice-h3 {
  font-size: 15.5px;
  font-weight: 800;
  margin: 0;
  color: #ffffff;
  letter-spacing: -0.01em;
}
.rkdf-notice-sub {
  font-size: 12px;
  color: #94a3b8;
  margin-top: 2px;
}
.rkdf-notice-close-btn {
  background: rgba(255, 255, 255, 0.12);
  border: none;
  color: #ffffff;
  font-size: 16px;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s ease;
}
.rkdf-notice-close-btn:hover {
  background: #E31B23;
  color: #ffffff;
  transform: rotate(90deg);
}

/* Scrollable Notice Body */
.rkdf-notice-body {
  padding: 18px 22px;
  max-height: 390px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 11px;
  background: #f8fafc;
  flex: 1;
}
.rkdf-notice-body::-webkit-scrollbar {
  width: 6px;
}
.rkdf-notice-body::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 4px;
}
.rkdf-notice-body::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}

/* Notice Item Cards */
.rkdf-notice-item {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #3b82f6;
  border-radius: 10px;
  padding: 13px 16px;
  transition: all 0.2s ease;
}
.rkdf-notice-item:hover {
  box-shadow: 0 4px 14px rgba(12, 20, 36, 0.08);
  transform: translateY(-2px);
  border-color: #cbd5e1;
}

/* Colored accent borders & tags */
.rkdf-notice-item.highlight-green {
  border-left-color: #10b981;
}
.rkdf-notice-item.highlight-gold {
  border-left-color: #f59e0b;
}
.rkdf-notice-item.highlight-blue {
  border-left-color: #3b82f6;
}
.rkdf-notice-item.highlight-purple {
  border-left-color: #8b5cf6;
}
.rkdf-notice-item.highlight-red {
  border-left-color: #E31B23;
  background: #fff5f5;
}
.rkdf-notice-item.highlight-teal {
  border-left-color: #06b6d4;
}

.rkdf-notice-tag {
  font-family: 'JetBrains Mono', ui-monospace, monospace;
  font-size: 10px;
  font-weight: 800;
  letter-spacing: 0.06em;
  margin-bottom: 4px;
  text-transform: uppercase;
}
.rkdf-notice-tag.tag-green  { color: #059669; }
.rkdf-notice-tag.tag-gold   { color: #d97706; }
.rkdf-notice-tag.tag-blue   { color: #2563eb; }
.rkdf-notice-tag.tag-purple { color: #7c3aed; }
.rkdf-notice-tag.tag-red    { color: #E31B23; }
.rkdf-notice-tag.tag-teal   { color: #0891b2; }

.rkdf-notice-link {
  color: #1e293b;
  font-size: 13.5px;
  line-height: 1.45;
  text-decoration: none;
  display: block;
  font-weight: 700;
}
.rkdf-notice-link strong {
  color: #0f172a;
  font-weight: 700;
}
.rkdf-notice-link:hover,
.rkdf-notice-link:hover strong {
  color: #E31B23;
}

/* Footer Action Bar */
.rkdf-notice-footer {
  padding: 14px 22px;
  background: #ffffff;
  border-top: 1px solid #e2e8f0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 12px;
}
.rkdf-notice-dontshow {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 12.5px;
  color: #64748b;
  cursor: pointer;
  user-select: none;
}
.rkdf-notice-dontshow input[type="checkbox"] {
  accent-color: #0c1424;
  width: 15px;
  height: 15px;
  cursor: pointer;
}
.rkdf-notice-ft-actions {
  display: flex;
  align-items: center;
  gap: 10px;
}
.rkdf-btn-all-notices {
  font-size: 13px;
  font-weight: 700;
  color: #0c1424;
  text-decoration: none;
  padding: 9px 16px;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  background: #ffffff;
  transition: all 0.2s ease;
}
.rkdf-btn-all-notices:hover {
  background: #f1f5f9;
  border-color: #94a3b8;
  color: #E31B23;
}
.rkdf-btn-dismiss {
  padding: 9px 20px;
  background: #0c1424;
  color: #ffffff;
  border: none;
  border-radius: 8px;
  font-weight: 700;
  font-size: 13px;
  cursor: pointer;
  transition: all 0.2s ease;
}
.rkdf-btn-dismiss:hover {
  background: #E31B23;
  color: #ffffff;
  box-shadow: 0 4px 14px rgba(227, 27, 35, 0.35);
}

/* ══════════════════════════════════════════════
   RESPONSIVE DESIGN (Mobile / Tablets)
   ══════════════════════════════════════════════ */
@media (max-width: 820px) {
  .rkdf-notice-modal-card {
    flex-direction: column;
    max-height: 92vh;
    overflow-y: auto;
  }
  .rkdf-popup-left-panel {
    width: 100%;
    min-width: 100%;
    border-right: none;
    border-bottom: 2px solid #E31B23;
    padding: 18px 16px;
  }
  .rkdf-popup-poster-card {
    max-width: 260px;
    margin: 0 auto;
  }
  .rkdf-popup-poster-caption {
    text-align: center;
    margin: 10px 0 12px;
  }
  .rkdf-notice-body {
    max-height: 280px;
    padding: 14px 16px;
  }
  .rkdf-notice-header {
    padding: 14px 16px;
  }
  .rkdf-notice-footer {
    padding: 12px 16px;
    flex-direction: column;
    align-items: stretch;
    gap: 12px;
  }
  .rkdf-notice-ft-actions {
    display: flex;
    width: 100%;
    gap: 8px;
  }
  .rkdf-btn-all-notices,
  .rkdf-btn-dismiss {
    flex: 1;
    text-align: center;
    justify-content: center;
  }
}
</style>

<script>
(function() {
  const overlay = document.getElementById('rkdfNoticeOverlay');
  const closeBtn = document.getElementById('rkdfNoticeClose');
  const dismissBtn = document.getElementById('rkdfNoticeDismissBtn');
  const dontShow = document.getElementById('rkdfNoticeDontShow');

  if (!overlay) return;

  const STORAGE_KEY = 'rkdf_notice_popup_dismissed_until';

  // Check if user chose "Don't show again today"
  function isSuppressed() {
    try {
      const until = localStorage.getItem(STORAGE_KEY);
      if (until && parseInt(until, 10) > Date.now()) {
        return true;
      }
    } catch(e) {}
    return false;
  }

  // Show after 2 seconds on page load if not suppressed
  if (!isSuppressed()) {
    setTimeout(function() {
      overlay.style.display = 'flex';
    }, 2000);
  }

  function hidePopup() {
    overlay.style.display = 'none';
    if (dontShow && dontShow.checked) {
      try {
        // Suppress for 24 hours
        localStorage.setItem(STORAGE_KEY, (Date.now() + 24 * 60 * 60 * 1000).toString());
      } catch(e) {}
    }
  }

  if (closeBtn) closeBtn.addEventListener('click', hidePopup);
  if (dismissBtn) dismissBtn.addEventListener('click', hidePopup);

  overlay.addEventListener('click', function(e) {
    if (e.target === overlay) hidePopup();
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && overlay.style.display === 'flex') {
      hidePopup();
    }
  });
})();
</script>
