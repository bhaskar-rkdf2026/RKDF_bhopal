<?php
// ============================================================
// RKDF University — Important Notice Modal Popup Component
// Controlled via Admin Panel Site Settings (popup_notice_active)
// ============================================================
require_once __DIR__ . '/site_settings.php';

$popupActive = (int)get_site_setting('popup_notice_active', 1);
if (!$popupActive) {
    return;
}

$popupTitle = htmlspecialchars(get_site_setting('popup_notice_title', 'RKDF University — Important Notices & Circulars'));
?>

<!-- ── IMPORTANT NOTICE POPUP MODAL DIALOG ── -->
<div class="rkdf-notice-modal-overlay" id="rkdfNoticeOverlay" aria-modal="true" role="dialog">
  <div class="rkdf-notice-modal-card">

    <!-- Header -->
    <div class="rkdf-notice-header">
      <div class="rkdf-notice-title-wrap">
        <span class="rkdf-notice-bell-icon">🔔</span>
        <div>
          <h3 class="rkdf-notice-h3"><?= $popupTitle ?></h3>
          <div class="rkdf-notice-sub">Latest official notifications, postponements & career updates</div>
        </div>
      </div>
      <button type="button" class="rkdf-notice-close-btn" id="rkdfNoticeClose" aria-label="Close Notice Popup">✕</button>
    </div>

    <!-- Scrolling Body Content -->
    <div class="rkdf-notice-body">
      
      <!-- Notice Item 1 -->
      <div class="rkdf-notice-item highlight-red">
        <div class="rkdf-notice-tag">CONVOCATION JUNE 2026</div>
        <a href="Convocation.php" target="_blank" class="rkdf-notice-link">
          <strong>🎓 RKDF University 15th Annual Convocation June 2026</strong> — Degree registration & Medalist list online portal open.
        </a>
      </div>

      <!-- Notice Item 2 -->
      <div class="rkdf-notice-item">
        <div class="rkdf-notice-tag tag-blue">EXAMINATION NOTICE</div>
        <a href="Content/Documents/Notices-26/EXAM POST PONED B.ARCH  JUNE-2026.pdf" target="_blank" class="rkdf-notice-link">
          📌 <strong>B.ARCH - EXAM POSTPONED NOTICE (JUNE-2026)</strong> — Click here to download revised timetable.
        </a>
      </div>

      <!-- Notice Item 3 -->
      <div class="rkdf-notice-item">
        <div class="rkdf-notice-tag tag-gold">WALK-IN INTERVIEW · RECRUITMENT</div>
        <a href="Careers.php" target="_blank" class="rkdf-notice-link">
          💼 <strong>Walk-in Interview for MPCST Sponsored Project Positions</strong> — AI-Based Smart Agriculture Drone & Precision Farming @ RKDF University Bhopal.
        </a>
      </div>

      <!-- Notice Item 4 -->
      <div class="rkdf-notice-item">
        <div class="rkdf-notice-tag tag-green">PH.D ADMISSIONS 2026</div>
        <a href="phd_entrance.php" target="_blank" class="rkdf-notice-link">
          🔬 <strong>Ph.D Entrance Examination 2026 Notification</strong> — Application form, syllabus & list of 70 approved research supervisors.
        </a>
      </div>

      <!-- Notice Item 5 -->
      <div class="rkdf-notice-item">
        <div class="rkdf-notice-tag tag-purple">ACCREDITATION</div>
        <a href="Content/Documents/NAAC-Certificate-of-Accrediation-RKDF-University-Bhopal.pdf" target="_blank" class="rkdf-notice-link">
          🏅 <strong>NAAC Certificate of Accreditation & ICAR Approval Details</strong> — Download official disclosure documents.
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
        <a href="Announcements.php" class="rkdf-btn-all-notices">View All Notices ↗</a>
        <button type="button" class="rkdf-btn-dismiss" id="rkdfNoticeDismissBtn">Got it, Close</button>
      </div>
    </div>

  </div>
</div>

<style>
.rkdf-notice-modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(12, 20, 36, 0.75);
  backdrop-filter: blur(8px);
  z-index: 10000;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  animation: rkdfNoticeFadeIn 0.3s ease-out;
}
@keyframes rkdfNoticeFadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
.rkdf-notice-modal-card {
  background: #ffffff;
  border-radius: 16px;
  max-width: 620px;
  width: 100%;
  box-shadow: 0 24px 48px rgba(0,0,0,0.3);
  overflow: hidden;
  border: 1px solid #e2e8f0;
  animation: rkdfNoticePop 0.35s cubic-bezier(0.19,1,0.22,1);
}
@keyframes rkdfNoticePop {
  from { opacity: 0; transform: scale(0.92) translateY(12px); }
  to { opacity: 1; transform: scale(1) translateY(0); }
}
.rkdf-notice-header {
  background: linear-gradient(135deg, #0f172a, #1e293b);
  color: #ffffff;
  padding: 20px 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 3px solid #D9232D;
}
.rkdf-notice-title-wrap {
  display: flex;
  align-items: center;
  gap: 14px;
}
.rkdf-notice-bell-icon {
  font-size: 24px;
}
.rkdf-notice-h3 {
  font-size: 16px;
  font-weight: 800;
  margin: 0;
  color: #ffffff;
}
.rkdf-notice-sub {
  font-size: 12px;
  color: #94a3b8;
  margin-top: 2px;
}
.rkdf-notice-close-btn {
  background: rgba(255,255,255,0.1);
  border: none;
  color: #ffffff;
  font-size: 18px;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.2s;
}
.rkdf-notice-close-btn:hover {
  background: #D9232D;
}
.rkdf-notice-body {
  padding: 20px 24px;
  max-height: 380px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 12px;
  background: #f8fafc;
}
.rkdf-notice-item {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #3b82f6;
  border-radius: 10px;
  padding: 14px 16px;
  transition: all 0.2s;
}
.rkdf-notice-item.highlight-red {
  border-left-color: #D9232D;
  background: #fff5f5;
}
.rkdf-notice-item:hover {
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
  transform: translateY(-1px);
}
.rkdf-notice-tag {
  font-size: 10px;
  font-weight: 800;
  letter-spacing: 0.5px;
  color: #D9232D;
  margin-bottom: 4px;
}
.rkdf-notice-tag.tag-blue { color: #2563eb; }
.rkdf-notice-tag.tag-gold { color: #d97706; }
.rkdf-notice-tag.tag-green { color: #166534; }
.rkdf-notice-tag.tag-purple { color: #7c3aed; }

.rkdf-notice-link {
  color: #1e293b;
  font-size: 13.5px;
  line-height: 1.5;
  text-decoration: none;
  display: block;
}
.rkdf-notice-link:hover {
  color: #D9232D;
}
.rkdf-notice-footer {
  padding: 16px 24px;
  background: #ffffff;
  border-top: 1px solid #e2e8f0;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.rkdf-notice-dontshow {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12.5px;
  color: #64748b;
  cursor: pointer;
  user-select: none;
}
.rkdf-notice-ft-actions {
  display: flex;
  align-items: center;
  gap: 12px;
}
.rkdf-btn-all-notices {
  font-size: 12.5px;
  font-weight: 700;
  color: #0f172a;
  text-decoration: none;
}
.rkdf-btn-all-notices:hover { text-decoration: underline; color: #D9232D; }
.rkdf-btn-dismiss {
  padding: 8px 18px;
  background: #D9232D;
  color: #ffffff;
  border: none;
  border-radius: 6px;
  font-weight: 700;
  font-size: 12.5px;
  cursor: pointer;
}
.rkdf-btn-dismiss:hover { background: #b01921; }
</style>

<script>
(function() {
  const overlay = document.getElementById('rkdfNoticeOverlay');
  const closeBtn = document.getElementById('rkdfNoticeClose');
  const dismissBtn = document.getElementById('rkdfNoticeDismissBtn');
  const dontShow = document.getElementById('rkdfNoticeDontShow');

  if (!overlay) return;

  // Check localStorage for "Don't show again today"
  const hideUntil = localStorage.getItem('rkdf_notice_hide_until');
  if (hideUntil && new Date().getTime() < parseInt(hideUntil, 10)) {
    overlay.style.display = 'none';
    return;
  }

  function hidePopup() {
    if (dontShow && dontShow.checked) {
      // Hide for 24 hours
      const expiry = new Date().getTime() + (24 * 60 * 60 * 1000);
      localStorage.setItem('rkdf_notice_hide_until', expiry.toString());
    }
    overlay.style.display = 'none';
  }

  if (closeBtn) closeBtn.addEventListener('click', hidePopup);
  if (dismissBtn) dismissBtn.addEventListener('click', hidePopup);

  overlay.addEventListener('click', function(e) {
    if (e.target === overlay) hidePopup();
  });
})();
</script>
