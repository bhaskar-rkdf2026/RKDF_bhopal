    </div> <!-- /.content-container -->
  </div> <!-- /.admin-main -->

  <style>
    .admin-footer-bar {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid var(--border-color);
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: var(--text-muted);
      font-size: 13px;
    }
  </style>

  <script>
    // Toast Notification helper
    function showToast(message, type = 'success') {
      const toast = document.createElement('div');
      toast.style.position = 'fixed';
      toast.style.bottom = '24px';
      toast.style.right = '24px';
      toast.style.padding = '14px 20px';
      toast.style.borderRadius = '8px';
      toast.style.color = '#fff';
      toast.style.fontWeight = '600';
      toast.style.fontSize = '14px';
      toast.style.zIndex = '9999';
      toast.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
      toast.style.display = 'flex';
      toast.style.alignItems = 'center';
      toast.style.gap = '10px';
      toast.style.transition = 'all 0.3s ease';
      
      if (type === 'success') {
        toast.style.background = '#10b981';
        toast.innerHTML = '<i class="fa-solid fa-circle-check"></i> ' + message;
      } else {
        toast.style.background = '#ef4444';
        toast.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> ' + message;
      }

      document.body.appendChild(toast);
      setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(10px)';
        setTimeout(() => toast.remove(), 300);
      }, 3500);
    }
  </script>
</body>
</html>
