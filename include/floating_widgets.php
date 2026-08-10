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
    <span class="float-icon">✍️</span>
    <span class="float-label">Apply Now</span>
  </a>

  <!-- Pay Fees Online Button -->
  <a href="https://erplive.rkdf.ac.in/" target="_blank" class="rkdf-float-btn float-pay" title="Pay Fees Online">
    <span class="float-icon">💳</span>
    <span class="float-label">Pay Fees</span>
  </a>

  <!-- WhatsApp Enquiry -->
  <a href="https://wa.me/917554075800?text=Hello%20RKDF%20University,%20I%20want%20to%20enquire%20about%20Admissions" target="_blank" class="rkdf-float-btn float-whatsapp" title="Chat on WhatsApp">
    <span class="float-icon">💬</span>
    <span class="float-label">Enquire</span>
  </a>

  <!-- Important Notices Trigger -->
  <button type="button" class="rkdf-float-btn float-notice" id="rkdfFloatNoticeBtn" title="View Important Notices">
    <span class="float-icon">🔔</span>
    <span class="float-label">Notices</span>
  </button>

</aside>

<style>
.rkdf-floating-toolbar {
  position: fixed;
  right: 0;
  top: 45%;
  transform: translateY(-50%);
  z-index: 999;
  display: flex;
  flex-direction: column;
  gap: 6px;
  padding-right: 4px;
}
.rkdf-float-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 14px 10px 12px;
  background: #0f172a;
  color: #ffffff;
  border-radius: 30px 0 0 30px;
  text-decoration: none;
  border: 1px solid rgba(255,255,255,0.1);
  border-right: none;
  font-size: 12px;
  font-weight: 700;
  box-shadow: -4px 6px 16px rgba(0,0,0,0.2);
  transform: translateX(65px);
  transition: transform 0.25s cubic-bezier(0.19,1,0.22,1), background 0.2s;
  cursor: pointer;
}
.rkdf-float-btn:hover {
  transform: translateX(0);
}
.rkdf-float-btn.float-apply {
  background: #D9232D;
  color: #ffffff;
}
.rkdf-float-btn.float-pay {
  background: #2563eb;
  color: #ffffff;
}
.rkdf-float-btn.float-whatsapp {
  background: #16a34a;
  color: #ffffff;
}
.rkdf-float-btn.float-notice {
  background: #d97706;
  color: #ffffff;
}
.float-icon {
  font-size: 16px;
}
.float-label {
  white-space: nowrap;
}
@media (max-width: 640px) {
  .rkdf-floating-toolbar {
    top: auto;
    bottom: 16px;
    right: 16px;
    transform: none;
    flex-direction: row;
    padding-right: 0;
  }
  .rkdf-float-btn {
    border-radius: 50%;
    width: 44px;
    height: 44px;
    padding: 0;
    justify-content: center;
    transform: none;
  }
  .rkdf-float-btn:hover { transform: none; }
  .float-label { display: none; }
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
