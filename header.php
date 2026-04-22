<style>
  /* ============================================================
     HEADER.PHP — Shared Mobile Nav Styles
     Included on every page, so all pages get identical mobile UX
  ============================================================ */

  /* Mobile hamburger button */
  .mobile-menu-btn {
    display: none;
    width: 44px; height: 44px;
    border-radius: 12px;
    background: rgba(124,92,252,0.1);
    border: 1px solid rgba(124,92,252,0.25);
    align-items: center; justify-content: center;
    cursor: pointer; flex-direction: column; gap: 5px;
    padding: 0;
    transition: background 0.3s, border-color 0.3s;
    flex-shrink: 0; z-index: 300; position: relative;
    -webkit-tap-highlight-color: transparent;
  }
  .mobile-menu-btn:hover { background:rgba(124,92,252,0.2); border-color:rgba(124,92,252,0.5) }
  .menu-bar {
    display: block; width: 20px; height: 2px;
    background: #a78bfa; border-radius: 4px;
    transition: transform 0.4s cubic-bezier(.22,.68,0,1.2), opacity 0.3s ease, width 0.3s ease;
    transform-origin: center;
  }
  .mobile-menu-btn.open .menu-bar:nth-child(1) { transform: translateY(7px) rotate(45deg) }
  .mobile-menu-btn.open .menu-bar:nth-child(2) { opacity: 0; transform: translateX(8px) }
  .mobile-menu-btn.open .menu-bar:nth-child(3) { transform: translateY(-7px) rotate(-45deg) }

  /* Overlay + slide-in panel */
  .mobile-nav-overlay {
    display: none; position: fixed; inset: 0; z-index: 190;
    pointer-events: none; overflow: hidden;
  }
  .mobile-nav-backdrop {
    position: absolute; inset: 0;
    background: rgba(5,3,13,0.7); backdrop-filter: blur(8px);
    opacity: 0; transition: opacity 0.4s ease;
  }
  .mobile-nav-panel {
    position: absolute; top: 0; right: 0;
    width: min(320px, calc(100vw - 1rem)); max-width: 100vw; height: 100%;
    background: linear-gradient(160deg, #0e0820 0%, #07050f 60%);
    border-left: 1px solid rgba(124,92,252,0.2);
    box-shadow: -20px 0 60px rgba(0,0,0,0.6), -2px 0 30px rgba(124,92,252,0.08);
    transform: translateX(100%);
    transition: transform 0.5s cubic-bezier(.22,.68,0,1.2);
    display: flex; flex-direction: column;
    padding: 90px 1.2rem 2.5rem;
    overflow-y: auto; overflow-x: hidden;
  }
  .mobile-nav-overlay.open { pointer-events: all }
  .mobile-nav-overlay.open .mobile-nav-backdrop { opacity: 1 }
  .mobile-nav-overlay.open .mobile-nav-panel { transform: translateX(0) }

  /* Nav link list */
  .mobile-nav-links { list-style: none; display: flex; flex-direction: column; gap: 0.3rem; margin-bottom: 2rem }
  .mobile-nav-links li { opacity: 0; transform: translateX(30px); transition: opacity 0.4s ease, transform 0.4s cubic-bezier(.22,.68,0,1.2) }
  .mobile-nav-overlay.open .mobile-nav-links li:nth-child(1) { opacity:1; transform:translateX(0); transition-delay:0.15s }
  .mobile-nav-overlay.open .mobile-nav-links li:nth-child(2) { opacity:1; transform:translateX(0); transition-delay:0.22s }
  .mobile-nav-overlay.open .mobile-nav-links li:nth-child(3) { opacity:1; transform:translateX(0); transition-delay:0.29s }
  .mobile-nav-overlay.open .mobile-nav-links li:nth-child(4) { opacity:1; transform:translateX(0); transition-delay:0.36s }
  .mobile-nav-links a {
    display: flex; align-items: center; gap: 1rem;
    padding: 1rem 1.2rem; border-radius: 14px;
    text-decoration: none; color: #8070b0;
    font-size: 1.1rem; font-weight: 600;
    font-family: 'Syne', sans-serif; letter-spacing: 0.02em;
    transition: background 0.25s, color 0.25s, transform 0.25s;
    border: 1px solid transparent;
    -webkit-tap-highlight-color: transparent;
  }
  .mobile-nav-links a:hover {
    background: rgba(124,92,252,0.1); color: #e8e0ff;
    border-color: rgba(124,92,252,0.2); transform: translateX(4px);
  }
  .mobile-nav-link-icon { font-size: 1.2rem; flex-shrink: 0 }
  .mobile-nav-divider { height: 1px; background: rgba(255,255,255,0.06); margin-bottom: 1.8rem }
  .mobile-nav-cta { margin-bottom: 1.5rem }
  .mobile-nav-footer { margin-top: auto; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.06) }
  .mobile-nav-footer p { font-size: 0.78rem; color: rgba(144,128,192,0.45); text-align: center }

  /* ---- "Download Free" gradient button inside the mobile panel ---- */
  .mobile-nav-cta .btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    width: 100%;
    background: linear-gradient(90deg, #7c5cfc 0%, #0284c7 50%, #5b3fe8 100%);
    background-size: 200% 200%;
    color: #fff;
    border: none;
    padding: 1rem 1.8rem;
    border-radius: 999px;
    font-family: 'Syne', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 0 35px rgba(124,92,252,0.4), 0 4px 20px rgba(0,0,0,0.5);
    transition: all 0.35s cubic-bezier(.22,.68,0,1.2);
    text-decoration: none;
    position: relative;
    overflow: hidden;
    -webkit-tap-highlight-color: transparent;
  }
  .mobile-nav-cta .btn-primary:hover {
    transform: translateY(-4px) scale(1.04);
    box-shadow: 0 0 40px rgba(124,92,252,0.5), 0 8px 30px rgba(0,0,0,0.5);
  }
  .mobile-nav-cta .btn-primary:focus { outline: none; box-shadow: 0 0 0 3px rgba(124,92,252,0.4) }

  /* ---- Responsive nav sizing (identical to index.php) ---- */

  /* Tablet: ≤960px */
  @media (max-width: 960px) {
    .nav-links          { display: none !important }
    .nav-cta            { display: none !important }
    .mobile-menu-btn    { display: flex }
    .mobile-nav-overlay { display: block }
    nav        { padding: 0 1.4rem; height: 60px; }
    .nav-logo  { transform: scale(1.5); margin-top: 6px; }
  }

  /* Mobile: ≤600px */
  @media (max-width: 600px) {
    nav        { padding: 0 1rem; height: 58px; }
    .nav-logo  { transform: scale(1.3); margin-top: 6px; }
    .mobile-nav-overlay,
    .mobile-nav-panel { overflow-x: hidden; }
  }

  /* Small mobile: ≤480px */
  @media (max-width: 480px) {
    nav        { padding: 0 0.8rem; }
    .nav-logo  { transform: scale(1.25); margin-left: -0.45rem; }
  }

  /* Extra small: ≤400px */
  @media (max-width: 400px) {
    nav        { padding: 0 0.5rem; }
    .nav-logo  { transform: scale(1.45); margin-left: -1.25rem; }
    .mobile-menu-btn         { width: 40px; height: 40px; }
    .mobile-menu-btn .menu-bar { width: 18px; }
  }

  /* Desktop: ≥961px — ensure nav links & CTA are shown */
  @media (min-width: 961px) {
    .mobile-menu-btn    { display: none         !important }
    .mobile-nav-overlay { display: none         !important }
    .nav-links          { display: flex          }
    .nav-cta            { display: inline-block  }
    nav       { padding: 0 2.5rem; height: 65px; }
    .nav-logo { transform: scale(1.8); margin-top: 9px; margin-left: 0; }
  }

  /* ---- FOOTER STYLES ---- */
  .page-footer { border-top: 1px solid rgba(255, 255, 255, 0.06); padding: 3rem 2.5rem 2rem; position: relative; z-index: 2; margin-top: 4rem; text-align: left; }
  .footer-inner { max-width: 1100px; margin: 0 auto }
  .footer-grid { display: grid; grid-template-columns: 1.8fr 1fr 1fr 1fr; gap: 2.5rem; margin-bottom: 2rem }
  .footer-brand .footer-logo-wrap { display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1.2rem; justify-content: flex-start; }
  .footer-logo { width: 110px; height: auto; object-fit: contain; display: block; transform: scale(2.2); transform-origin: left center; margin-bottom: 0.4rem; margin-left: 0; }
  .footer-tagline { color: #8070b0; font-size: 0.88rem; line-height: 1.6; max-width: 240px; margin-bottom: 1.2rem }
  .footer-social { display: flex; gap: 0.7rem }
  .social-btn { width: 36px; height: 36px; border-radius: 10px; background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08); display: flex; align-items: center; justify-content: center; font-size: 1rem; text-decoration: none !important; transition: all 0.25s; color: #8070b0 !important }
  .social-btn:hover { background: rgba(124, 92, 252, 0.15); border-color: rgba(124, 92, 252, 0.35); color: #e8e0ff !important; transform: translateY(-2px) }
  .footer-col-title { font-family: 'Syne', sans-serif; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(167, 139, 250, 0.7); margin-bottom: 1rem }
  .footer-col-links { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; padding: 0; margin: 0; }
  .footer-col-links a { color: #8070b0 !important; text-decoration: none !important; font-size: 0.875rem; transition: color 0.2s }
  .footer-col-links a:hover { color: #e8e0ff !important }
  .footer-bottom { padding-top: 1.5rem; border-top: 1px solid rgba(255, 255, 255, 0.06); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem }
  .footer-copy { color: rgba(144, 128, 192, 0.45); font-size: 0.82rem }
  .footer-legal { display: flex; gap: 1.5rem }
  .footer-legal a { color: rgba(144, 128, 192, 0.5) !important; text-decoration: none !important; font-size: 0.8rem; transition: color 0.2s }
  .footer-legal a:hover { color: #8070b0 !important }

  @media (max-width: 960px) {
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 2rem }
  }
  @media (max-width: 600px) {
    .page-footer { padding: 3rem 1.2rem 2rem; text-align: center; }
    .footer-grid { grid-template-columns: 1fr; text-align: center; }
    .footer-brand .footer-logo-wrap { justify-content: center; }
    .footer-logo { transform-origin: center center; margin: 0 auto; }
    .footer-tagline { margin: 0 auto 1.5rem; }
    .footer-social { justify-content: center; margin-bottom: 1rem; }
    .footer-bottom { flex-direction: column; text-align: center; gap: 0.8rem; }
  }
</style>

  <div class="scroll-progress-bar" id="scroll-bar"></div>
  <div class="bg-fixed">
    <div class="bg-orb orb1"></div>
    <div class="bg-orb orb2"></div>
    <div class="bg-orb orb3"></div>
  </div>
  <canvas id="particles-canvas"></canvas>

  <!-- Mobile menu overlay -->
  <div class="mobile-nav-overlay" id="mobileNavOverlay">
    <div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>
    <div class="mobile-nav-panel">
      <ul class="mobile-nav-links">
        <li>
          <a href="index.php#features" class="mobile-nav-link">
            <span class="mobile-nav-link-icon">✦</span>
            Features
          </a>
        </li>
        <li>
          <a href="index.php#showcase" class="mobile-nav-link">
            <span class="mobile-nav-link-icon">🖥️</span>
            Showcase
          </a>
        </li>
        <li>
          <a href="index.php#install" class="mobile-nav-link">
            <span class="mobile-nav-link-icon">⬇️</span>
            Download
          </a>
        </li>
        <li>
          <a href="index.php#contact" class="mobile-nav-link">
            <span class="mobile-nav-link-icon">💬</span>
            Contact
          </a>
        </li>
      </ul>
      <div class="mobile-nav-divider"></div>
      <div class="mobile-nav-cta">
        <a href="index.php#install" class="btn-primary">Download Free</a>
      </div>
      <div class="mobile-nav-footer">
        <p>Fast. Focused. Free forever.</p>
      </div>
    </div>
  </div>

  <nav id="navbar">
    <a href="index.php#hero" style="display:contents"><img src="image/logo.webp" alt="NetGlide Logo" class="nav-logo"></a>
    <ul class="nav-links">
      <li><a href="index.php#features">Features</a></li>
      <li><a href="index.php#showcase">Showcase</a></li>
      <li><a href="index.php#install">Download</a></li>
      <li><a href="index.php#contact">Contact</a></li>
    </ul>
    <a href="index.php#install" class="nav-cta">Download Free</a>
    <button class="mobile-menu-btn" id="menuBtn" aria-label="Toggle menu" aria-expanded="false">
      <span class="menu-bar"></span>
      <span class="menu-bar"></span>
      <span class="menu-bar"></span>
    </button>
  </nav>
