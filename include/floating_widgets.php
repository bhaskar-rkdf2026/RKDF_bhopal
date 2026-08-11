<?php
// ============================================================
// RKDF University — Floating Quick Action Widgets Component
// Fixed vertical toolbar on right screen edge
// ============================================================
?>

<!-- ── FIXED RIGHT FLOATING ACTIONS TOOLBAR ── -->
<aside class="rkdf-floating-toolbar" aria-label="Quick Actions">
  
  <!-- Apply Now Button -->
  <a href="admissionform.php" class="rkdf-float-btn float-apply" title="Apply Online Admissions 2026-27">
    <span class="float-icon">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
    </span>
    <span class="float-label">Apply Now</span>
  </a>

  <!-- Pay Fees Online Button -->
  <a href="https://erplive.rkdf.ac.in/" target="_blank" class="rkdf-float-btn float-pay" title="Pay Fees Online">
    <span class="float-icon">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
    </span>
    <span class="float-label">Pay Fees</span>
  </a>

  <!-- WhatsApp Enquiry -->
  <a href="https://wa.me/917554075800?text=Hello%20RKDF%20University,%20I%20want%20to%20enquire%20about%20Admissions" target="_blank" class="rkdf-float-btn float-whatsapp" title="Chat on WhatsApp">
    <span class="float-icon">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
    </span>
    <span class="float-label">Enquire</span>
  </a>

  <!-- Important Notices Trigger -->
  <button type="button" class="rkdf-float-btn float-notice" id="rkdfFloatNoticeBtn" title="View Important Notices">
    <span class="float-icon">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
    </span>
    <span class="float-label">Notices</span>
  </button>

</aside>

<style>
.rkdf-floating-toolbar {
  position: fixed;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  z-index: 9999;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 8px;
  padding-right: 0;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.rkdf-float-btn {
  display: inline-flex;
  align-items: center;
  justify-content: flex-start;
  height: 44px;
  padding: 0 14px 0 12px;
  color: #ffffff !important;
  border-radius: 24px 0 0 24px;
  text-decoration: none !important;
  font-size: 12.5px;
  font-weight: 700;
  letter-spacing: 0.03em;
  box-shadow: -4px 6px 20px rgba(12, 20, 36, 0.16);
  /* Default collapsed state: show only icon (first 44px) */
  transform: translateX(calc(100% - 35px));
  transition: transform 0.3s cubic-bezier(0.19, 1, 0.22, 1), box-shadow 0.3s ease;
  cursor: pointer;
  border: 1px solid rgba(255, 255, 255, 0.25);
  border-right: none;
  backdrop-filter: blur(8px);
  user-select: none;
  white-space: nowrap;
}

/* Hover state: smooth slide out to reveal full label */
.rkdf-float-btn:hover {
  transform: translateX(0);
  box-shadow: -6px 8px 24px rgba(12, 20, 36, 0.28);
  color: #ffffff !important;
}

.rkdf-float-btn.float-apply {
  background: linear-gradient(135deg, #E31B23 0%, #C9192A 100%);
}
.rkdf-float-btn.float-apply:hover {
  background: linear-gradient(135deg, #FF1F29 0%, #D91A2B 100%);
}

.rkdf-float-btn.float-pay {
  background: linear-gradient(135deg, #1E40AF 0%, #1D4ED8 100%);
}
.rkdf-float-btn.float-pay:hover {
  background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
}

.rkdf-float-btn.float-whatsapp {
  background: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
}
.rkdf-float-btn.float-whatsapp:hover {
  background: linear-gradient(135deg, #22C55E 0%, #16A34A 100%);
}

.rkdf-float-btn.float-notice {
  background: linear-gradient(135deg, #D97706 0%, #B45309 100%);
}
.rkdf-float-btn.float-notice:hover {
  background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
}

.float-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 20px;
  height: 20px;
  flex-shrink: 0;
}

.float-label {
  white-space: nowrap;
  line-height: 1;
  padding-left: 6px;
}

@media (max-width: 768px) {
  .rkdf-floating-toolbar {
    top: auto;
    bottom: 20px;
    right: 16px;
    transform: none;
    flex-direction: row;
    gap: 8px;
  }
  .rkdf-float-btn {
    border-radius: 50%;
    width: 46px;
    height: 46px;
    padding: 0;
    justify-content: center;
    transform: none;
    border-right: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 4px 16px rgba(12, 20, 36, 0.2);
  }
  .rkdf-float-btn:hover {
    transform: translateY(-4px);
  }
  .float-label {
    display: none;
  }
}
</style>

<script>
(function() {
  const btn = document.getElementById('rkdfFloatNoticeBtn');
  if (btn) {
    btn.addEventListener('click', function() {
      const overlay = document.getElementById('rkdfNoticeOverlay');
      if (overlay) overlay.style.display = 'flex';
    });
  }
})();
</script>

