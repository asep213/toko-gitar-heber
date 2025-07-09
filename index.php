<?php
session_start(); // PENTING: Mulai sesi di awal setiap file PHP yang menggunakan sesi
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Toko Gitar Heber</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: #f3f6fa;
      margin: 0;
      color: #222;
    }
    header {
      background: #0077b6;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 10;
    }
    header img {
      height: 38px;
      margin-right: 16px;
      border-radius: 6px;
      background: #fff;
      padding: 2px 6px;
    }
    header nav {
      display: flex;
      gap: 18px;
      align-items: center;
    }
    header a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      padding: 6px 12px;
      border-radius: 4px;
      transition: background 0.2s;
    }
    header a:hover {
      background: #023e8a;
    }
    #landing {
      background: #e0f2fe;
      min-height: 60vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 60px 10px 30px 10px;
    }
    #landing h1 {
      color: #0077b6;
      font-size: 2.2em;
      margin-bottom: 10px;
      font-weight: bold;
    }
    #landing p {
      color: #333;
      font-size: 1.1em;
      margin-bottom: 18px;
    }
    .cta-button {
      background: #0077b6;
      color: #fff;
      border: none;
      border-radius: 6px;
      padding: 10px 28px;
      font-size: 1em;
      font-weight: bold;
      margin: 0 6px;
      cursor: pointer;
      transition: background 0.2s;
    }
    .cta-button:hover {
      background: #023e8a;
    }
    #register-section, #login-section { /* Added #login-section */
      background: #fff;
      max-width: 400px;
      margin: 30px auto 40px auto;
      border-radius: 10px;
      box-shadow: 0 2px 8px #0001;
      padding: 24px 18px 18px 18px;
    }
    #register-section h2, #login-section h2 { /* Added #login-section h2 */
      color: #0077b6;
      font-size: 1.3em;
      margin-bottom: 18px;
      text-align: center;
    }
    #registerForm label, #loginForm label { /* Added #loginForm label */
      font-weight: bold;
      margin-bottom: 4px;
      display: block;
      color: #0077b6;
    }
    #registerForm input, #loginForm input { /* Added #loginForm input */
      width: 100%;
      padding: 8px 10px;
      margin-bottom: 12px;
      border: 1px solid #bdbdbd;
      border-radius: 5px;
      font-size: 1em;
      box-sizing: border-box;
    }
    #registerForm button, #loginForm button { /* Added #loginForm button */
      width: 100%;
      margin-top: 8px;
    }
    #cart-section {
      background: #fff;
      max-width: 700px;
      margin: 0 auto 30px auto;
      border-radius: 10px;
      box-shadow: 0 2px 8px #0001;
      padding: 18px 18px 12px 18px;
    }
    #cart-section h2 {
      color: #0077b6;
      font-size: 1.2em;
      margin-bottom: 12px;
      text-align: center;
    }
    #cart-list {
      list-style: none;
      padding: 0;
      margin: 0 0 10px 0;
    }
    #cart-list li {
      padding: 6px 0;
      border-bottom: 1px solid #e0e0e0;
      font-size: 1em;
      color: #0077b6;
    }
    #cart-quantity, #cart-total {
      font-weight: bold;
      font-size: 1em;
      margin-top: 8px;
      color: #0077b6;
    }
    #checkout-button {
      margin-top: 12px;
      padding: 10px 20px;
      background: #0077b6;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 1em;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.2s;
    }
    #checkout-button:hover {
      background: #023e8a;
    }
    .products {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 16px;
      max-width: 900px;
      margin: 0 auto 30px auto;
      padding: 0 10px;
    }
    .product {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px #0001;
      padding: 12px 8px 10px 8px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      transition: box-shadow 0.2s;
    }
    .product:hover {
      box-shadow: 0 4px 16px #0077b633;
    }
    .product img {
      height: 90px;
      width: auto;
      margin-bottom: 8px;
      border-radius: 6px;
      background: #f3f6fa;
    }
    .product .name {
      font-size: 1em;
      font-weight: bold;
      margin-bottom: 6px;
      color: #0077b6;
    }
    .product .price {
      font-size: 0.95em;
      font-weight: bold;
      margin-bottom: 10px;
      color: #222;
    }
    .product button {
      font-size: 0.95em;
      padding: 7px 14px;
      border-radius: 5px;
      background: #0077b6;
      color: #fff;
      cursor: pointer;
      border: none;
      font-weight: bold;
      margin-top: 4px;
      transition: background 0.2s;
    }
    .product button:hover {
      background: #023e8a;
    }
    .message {
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
    }
    .success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    @media (max-width: 600px) {
      #register-section, #cart-section, #login-section { /* Added #login-section */
        padding: 10px 4px;
      }
      .products {
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 8px;
      }
      .product img {
        height: 60px;
      }
    }
  </style>
</head>
<body>
  <header style="backdrop-filter: blur(6px); background: rgba(15,32,39,0.95); border-bottom: 2px solid #00b0ff; box-shadow: 0 2px 12px rgba(0,0,0,0.25);">
    <img src="img/logo.png" alt="Logo Toko Gitar Heber" style="height: 48px; margin-right: auto; border-radius: 8px; box-shadow: 0 2px 8px #00b0ff33; background: #fff; padding: 2px 8px;">
    <nav style="display: flex; gap: 24px; align-items: center;">
      <a href="#landing">Home</a>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <a href="#cart-section">Keranjang</a>
        <a href="#about-us">About Us</a>
        <a href="#portfolio">Portofolio</a>
        <a href="https://wa.me/+6282230816380" target="_blank">Contact</a>
        <span style="color: #fff; font-weight: bold;">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a href="logout.php" style="background: #e74c3c;">Logout</a>
      <?php else: ?>
        <a href="#register-section">Register</a>
        <a href="#login-section">Login</a>
        <a href="#about-us">About Us</a>
        <a href="https://wa.me/+6282230816380" target="_blank">Contact</a>
        <a href="#portfolio">Portofolio</a>
      <?php endif; ?>
    </nav>
  </header>

  <section id="landing" style="padding-top: 70px; position: relative; min-height: 100vh; overflow: hidden;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none;">
      <canvas id="guitarCanvas" style="width: 100%; height: 100%; display: block;"></canvas>
    </div>
    <div style="position: relative; z-index: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; min-height: 80vh;">
      <h1 style="animation-delay: 0.2s; font-size: 3.2em; color: #fff; text-shadow: 0 0 18px #00b0ff, 0 2px 8px #000; margin-bottom: 18px;">Selamat Datang di <span style='color:#00b0ff; text-shadow:0 0 18px #fff;'>Toko Gitar Heber</span></h1>
      <p style="animation-delay: 0.5s; font-size: 1.5em; color: #cce7ff; text-shadow: 0 2px 8px #000; margin-bottom: 32px;">Temukan <span style='color:#00b0ff; font-weight:bold;'>gitar</span> dan perlengkapan musik terbaik untuk Anda.<br>Jelajahi koleksi kami dan rasakan pengalaman belanja yang <span style='color:#00b0ff; font-weight:bold;'>interaktif</span>!</p>
      <div style="margin: 30px 0 0 0; display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
            <button class="cta-button" id="scrollToRegister">Daftar Sekarang</button>
            <button class="cta-button" id="scrollToLogin" style="background: #27ae60;">Login</button> <?php endif; ?>
        <button class="cta-button" id="scrollToProducts" style="background: var(--button-gradient-hover);">Lihat Produk</button>
      </div>
      <div style="margin-top: 40px; display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <a href="#cart-section" class="cta-button" style="background: transparent; border: 2px solid #00b0ff; color: #00b0ff; box-shadow: none;">Lihat Keranjang</a>
        <a href="#about-us" class="cta-button" style="background: transparent; border: 2px solid #00b0ff; color: #00b0ff; box-shadow: none;">Tentang Kami</a>
      </div>
    </div>
  </section>

  <?php if (isset($_SESSION['success_message'])): ?>
    <div class="message success">
      <?php
      echo $_SESSION['success_message'];
      unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
      ?>
    </div>
  <?php elseif (isset($_SESSION['error_message'])): ?>
    <div class="message error">
      <?php
      echo $_SESSION['error_message'];
      unset($_SESSION['error_message']); // Hapus pesan setelah ditampilkan
      ?>
    </div>
  <?php endif; ?>

  <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
  <section id="register-section">
    <h2 style="text-align:center; color:#00b0ff; margin-bottom: 24px;">Daftar Akun Baru</h2>
    <form id="registerForm" action="register_process.php" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
      <label for="regUsername">Username:</label>
      <input type="text" id="regUsername" name="username" required placeholder="Buat username unik">

      <label for="regEmail">Email:</label>
      <input type="email" id="regEmail" name="email" required placeholder="contoh@email.com">

      <label for="regPassword">Password:</label>
      <input type="password" id="regPassword" name="password" required placeholder="Buat password">

      <button type="submit" class="cta-button" style="margin-top: 10px;">Daftar</button>
    </form>
  </section>

  <section id="login-section">
    <h2 style="text-align:center; color:#00b0ff; margin-bottom: 24px;">Login ke Akun Anda</h2>
    <form id="loginForm" action="login_process.php" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
      <label for="loginUsernameEmail">Username atau Email:</label>
      <input type="text" id="loginUsernameEmail" name="username_or_email" required placeholder="Masukkan username atau email Anda">

      <label for="loginPassword">Password:</label>
      <input type="password" id="loginPassword" name="password" required placeholder="Masukkan password Anda">

      <button type="submit" class="cta-button" style="margin-top: 10px; background: #27ae60;">Login</button>
    </form>
  </section>
  <?php endif; ?>

  <section id="cart-section">
    <h2 style="text-align:center; color:#00b0ff; margin-bottom: 18px;">Keranjang Belanja</h2>
    <ul id="cart-list"></ul>
    <div id="cart-quantity">Jumlah Barang: 0</div>
    <div id="cart-total">Total: Rp0</div>
    <button id="checkout-button">Checkout</button>
  </section>

  <style>
    #cart-section {
      max-width: 1100px;
      margin: 0 auto 50px auto;
      padding: 0 20px;
      color: #00b0ff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #cart-section h2 {
      margin-bottom: 15px;
      font-weight: 700;
    }
    #cart-list {
      list-style: none;
      padding: 0;
      margin: 0 0 10px 0;
    }
    #cart-list li {
      padding: 8px 12px;
      border-bottom: 1px solid #004e92;
      font-weight: 700;
      color: #00b0ff;
    }
    #cart-quantity, #cart-total {
      font-weight: 700;
      font-size: 1.1em;
      margin-top: 10px;
    }
    #cart-total {
      color: #00b0ff;
    }
    #cart-quantity {
      color: #00b0ff;
    }
    #checkout-button {
      margin-top: 15px;
      padding: 12px 20px;
      background: linear-gradient(135deg, #00b0ff, #005f99);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1em;
      cursor: pointer;
      box-shadow: 0 5px 15px rgba(0, 176, 255, 0.5);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    #checkout-button:hover {
      background-color: #005f99;
      box-shadow: 0 8px 20px rgba(0, 95, 153, 0.7);
    }
  </style>

  <section class="products" style="margin-top: 40px;">
    <div class="product" style="box-shadow: 0 8px 24px #00b0ff22;">
      <img src="img/gitar.jpg" alt="Yamaha CS40 3/4-Size Classical Guitar, Natural" style="background: #fff;" />
      <div class="name">Yamaha CS40 3/4-Size Classical Guitar, Natural</div>
      <div class="price">Rp1.261.000</div>
      <button type="button" aria-label="Tambah Yamaha CS40 3/4-Size Classical Guitar ke keranjang">Tambah ke Keranjang</button>
    </div>

    <div class="product" style="box-shadow: 0 8px 24px #00b0ff22;">
      <img src="img/gitar2.jpg" alt="Yamaha Gitar Akustik Elektrik FX400" style="background: #fff;" />
      <div class="name">Yamaha Gitar Akustik Elektrik FX400</div>
      <div class="price">Rp2.100.000</div>
      <button type="button" aria-label="Tambah Yamaha Gitar Akustik Elektrik FX400 ke keranjang">Tambah ke Keranjang</button>
    </div>

    <div class="product" style="box-shadow: 0 8px 24px #00b0ff22;">
      <img src="img/gitar3.jpg" alt="Yamaha Gitar Elektrik PAC 612VIIX" style="background: #fff;" />
      <div class="name">Yamaha Gitar Elektrik PAC 612VIIX</div>
      <div class="price">Rp6.275.000</div>
      <button type="button" aria-label="Tambah Yamaha Gitar Elektrik PAC 612VIIX ke keranjang">Tambah ke Keranjang</button>
    </div>

    <div class="product" style="box-shadow: 0 8px 24px #00b0ff22;">
      <img src="img/gitar4.jpg" alt="Yamaha Bass Elektrik BB234" style="background: #fff;" />
      <div class="name">Yamaha Bass Elektrik BB234</div>
      <div class="price">Rp3.180.000</div>
      <button type="button" aria-label="Tambah Yamaha Bass Elektrik BB234 ke keranjang">Tambah ke Keranjang</button>
    </div>

    <div class="product" style="box-shadow: 0 8px 24px #00b0ff22;">
      <img src="img/ampli.jpg" alt="Fender Acoustasonic 15 Acoustic Guitar Amplifier, 230V EU" style="background: #fff;" />
      <div class="name">Fender Acoustasonic 15 Acoustic Guitar Amplifier, 230V EU</div>
      <div class="price">Rp2.750.000</div>
      <button type="button" aria-label="Tambah Fender Acoustasonic 15 Acoustic Guitar Amplifier ke keranjang">Tambah ke Keranjang</button>
    </div>

    <div class="product" style="box-shadow: 0 8px 24px #00b0ff22;">
      <img src="img/kabel.jpg" alt="Kabel Jack Gitar Keyboard dan Bass Canare Panjang 6M" style="background: #fff;" />
      <div class="name">Kabel Jack Gitar Keyboard dan Bass Canare Panjang 6M</div>
      <div class="price">Rp105.000</div>
      <button type="button" aria-label="Tambah Kabel Jack Gitar Keyboard dan Bass Canare Panjang 6M ke keranjang">Tambah ke Keranjang</button>
    </div>
  </section>

  <section id="about-us" style="max-width: 1100px; margin: 40px auto 60px auto; padding: 40px 20px; background: linear-gradient(135deg, #001f3f, #003366); border-radius: 20px; box-shadow: 0 8px 20px rgba(0, 31, 63, 0.6); display: flex; flex-wrap: wrap; align-items: center; gap: 30px; color: #00b0ff; font-weight: 600; transition: box-shadow 0.3s ease;">
    <div style="flex: 1 1 300px; min-width: 280px; max-width: 450px; animation: fadeInLeft 1s ease forwards; opacity: 0;">
      <img src="img/gitar4.jpg" alt="About Us Image" style="width: 100%; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 176, 255, 0.3);">
    </div>
    <div style="flex: 2 1 400px; min-width: 280px; animation: fadeInRight 1s ease forwards; opacity: 0;">
      <h2 style="color: #00b0ff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-bottom: 20px; font-size: 2.2em; font-weight: 700;">About Us</h2>
      <p style="font-size: 1.2em; color: #cce7ff; line-height: 1.6; margin-bottom: 20px;">
        Toko Gitar Heber adalah toko musik terpercaya yang menyediakan berbagai jenis gitar dan perlengkapan musik berkualitas tinggi. Kami berkomitmen memberikan pelayanan terbaik untuk para musisi dan pecinta musik.
      </p>
      <div style="margin-top: 30px;">
        <a href="https://www.instagram.com/kyy_eyo?igsh=NWhvZ3Z3dDUxMDI2" id="instagram-link" target="_blank" style="margin-right: 20px; display: inline-block; transition: transform 0.3s ease;">
          <img src="img/logo ig.png" alt="Instagram" style="width: 50px; height: 50px; filter: drop-shadow(0 0 2px #00b0ff);">
        </a>
        <a href="https://www.facebook.com/share/1Enj2iBi6e/" id="facebook-link" target="_blank" style="margin-right: 20px; display: inline-block; transition: transform 0.3s ease;">
          <img src="img/logo fb.jpg" alt="Facebook" style="width: 50px; height: 50px; filter: drop-shadow(0 0 2px #00b0ff);">
        </a>
        <a href="https://wa.me/+6282230816380" id="whatsapp-link" target="_blank" style="display: inline-block; transition: transform 0.3s ease;">
          <img src="img/wa.jpg" alt="WhatsApp" style="width: 50px; height: 50px; filter: drop-shadow(0 0 2px #00b0ff);">
        </a>
      </div>
    </div>
  </section>

  <section id="portfolio" style="max-width: 1100px; margin: 40px auto 60px auto; padding: 40px 20px; background: linear-gradient(135deg, #001f3f, #003366); border-radius: 20px; box-shadow: 0 8px 20px rgba(0, 31, 63, 0.6); color: #00b0ff; font-weight: 600; display: flex; flex-wrap: wrap; align-items: center; gap: 30px;">
    <div style="flex: 1 1 300px; min-width: 280px; max-width: 450px;">
      <img src="img/logo.png" alt="Portfolio Image" style="width: 100%; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 176, 255, 0.3);">
    </div>
    <div style="flex: 2 1 400px; min-width: 280px;">
      <h2 style="color: #00b0ff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-bottom: 20px; font-size: 2.2em; font-weight: 700;">Portofolio Toko Gitar Heber</h2>
      <p style="font-size: 1.2em; color: #cce7ff; line-height: 1.6; margin-bottom: 20px;">
        "Di Toko Gitar Heber, kami memahami bahwa sebuah gitar bukan sekadar instrumen; ia adalah perpanjangan dari jiwa musisi, alat untuk berekspresi, dan pembawa emosi. Kami mendedikasikan diri untuk menyediakan gitar dan perlengkapan berkualitas tinggi yang telah melalui seleksi ketat. Setiap instrumen di toko kami dipilih dengan cermat oleh para ahli yang memiliki pemahaman mendalam tentang akustik, konstruksi, dan ergonomi. Kami percaya bahwa setiap detail kecil, mulai dari resonansi kayu pilihan hingga presisi fretwork, berkontribusi pada pengalaman bermain yang luar biasa. Portofolio ini adalah bukti komitmen kami terhadap kualitas tak tertandingi dan keahlian yang berdedikasi, memastikan Anda menemukan instrumen yang tidak hanya terdengar indah, tetapi juga terasa sempurna di tangan Anda."
      </p>
      <div style="margin-top: 30px;">
        <a href="https://www.instagram.com/kyy_eyo?igsh=NWhvZ3Z3dDUxMDI2" id="instagram-link" target="_blank" style="margin-right: 20px; display: inline-block; transition: transform 0.3s ease;">
          <img src="img/logo ig.png" alt="Instagram" style="width: 50px; height: 50px; filter: drop-shadow(0 0 2px #00b0ff);">
        </a>
        <a href="https://www.facebook.com/share/1Enj2iBi6e/" id="facebook-link" target="_blank" style="margin-right: 20px; display: inline-block; transition: transform 0.3s ease;">
          <img src="img/logo fb.jpg" alt="Facebook" style="width: 50px; height: 50px; filter: drop-shadow(0 0 2px #00b0ff);">
        </a>
        <a href="https://wa.me/+6282230816380" id="whatsapp-link" target="_blank" style="display: inline-block; transition: transform 0.3s ease;">
          <img src="img/wa.jpg" alt="WhatsApp" style="width: 50px; height: 50px; filter: drop-shadow(0 0 2px #00b0ff);">
        </a>
      </div>
    </div>
  </section>

  <style>
    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    #about-us a:hover {
      transform: scale(1.1);
    }
  </style>

  <script>
  window.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('guitarCanvas');
    if (canvas) {
      const ctx = canvas.getContext('2d');
      function resizeCanvas() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
      }
      resizeCanvas();
      window.addEventListener('resize', resizeCanvas);


      const stringCount = 6;
      const strings = [];
      for (let i = 0; i < stringCount; i++) {
        strings.push({
          y: (canvas.height / (stringCount + 1)) * (i + 1),
          phase: Math.random() * Math.PI * 2,
          amp: 0,
          freq: 0.015 + Math.random() * 0.01
        });
      }

      function animateStrings(time) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let i = 0; i < stringCount; i++) {
          const s = strings[i];
          ctx.beginPath();
          ctx.strokeStyle = i === 0 ? '#ffd700' : '#e0e0e0';
          ctx.lineWidth = i === 0 ? 3 : 2;
          for (let x = 0; x < canvas.width; x += 2) {
            const y = s.y + Math.sin((x * s.freq) + (time / 400) + s.phase) * (s.amp * Math.sin(time / 400 + s.phase));
            if (x === 0) ctx.moveTo(x, y);
            else ctx.lineTo(x, y);
          }
          ctx.stroke();
        }
        requestAnimationFrame(animateStrings);
      }
      animateStrings(0);


      canvas.addEventListener('click', function(e) {
        const rect = canvas.getBoundingClientRect();
        const y = e.clientY - rect.top;
        for (let i = 0; i < stringCount; i++) {
          if (Math.abs(y - strings[i].y) < 15) {
            strings[i].amp = 18 + Math.random() * 8;
            setTimeout(() => { strings[i].amp = 0; }, 400);
          }
        }
      });
    }
  });


  function parsePrice(priceStr) {
    return Number(priceStr.replace(/[^0-9]/g, ''));
  }

  function formatPrice(priceNum) {
    return 'Rp' + priceNum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  const cart = [];
  const products = document.querySelectorAll('.product');

  products.forEach((product) => {
    const btn = product.querySelector('button');
    btn.disabled = false;

    btn.addEventListener('click', () => {
      const name = product.querySelector('.name').textContent;
      const priceText = product.querySelector('.price').textContent;
      const price = parsePrice(priceText);

      const existing = cart.find(item => item.name === name);
      if (existing) {
        existing.qty++;
      } else {
        cart.push({ name, price, qty: 1 });
      }
      renderCart();
    });
  });

  function renderCart() {
    const cartList = document.getElementById('cart-list');
    cartList.innerHTML = '';

    let total = 0;
    let totalQty = 0;
    cart.forEach(item => {
      total += item.price * item.qty;
      totalQty += item.qty;
      const li = document.createElement('li');
      li.textContent = `${item.name} x${item.qty} - ${formatPrice(item.price * item.qty)}`;
      cartList.appendChild(li);
    });

    document.getElementById('cart-total').textContent = `Total: ${formatPrice(total)}`;
    document.getElementById('cart-quantity').textContent = `Jumlah Barang: ${totalQty}`;
  }

  const checkoutButton = document.getElementById('checkout-button');
  checkoutButton.addEventListener('click', () => {
    if (cart.length === 0) {
      alert('Keranjang belanja kosong. Silakan tambahkan produk terlebih dahulu.');
      return;
    }

    alert(`Checkout berhasil! Total pembayaran: ${document.getElementById('cart-total').textContent}`);
    location.reload();
  });

  const scrollToRegisterBtn = document.getElementById('scrollToRegister');
  if (scrollToRegisterBtn) { // Check if element exists before adding event listener
    scrollToRegisterBtn.addEventListener('click', () => {
      document.getElementById('register-section').scrollIntoView({ behavior: 'smooth' });
    });
  }

  const scrollToLoginBtn = document.getElementById('scrollToLogin'); // New scroll to login button
  if (scrollToLoginBtn) {
    scrollToLoginBtn.addEventListener('click', () => {
      document.getElementById('login-section').scrollIntoView({ behavior: 'smooth' });
    });
  }

  const scrollToProductsBtn = document.getElementById('scrollToProducts');
  if (scrollToProductsBtn) {
    scrollToProductsBtn.addEventListener('click', () => {
      document.querySelector('.products').scrollIntoView({ behavior: 'smooth' });
    });
  }

  // NOTE: Hapus event listener submit dari JavaScript untuk form register
  // karena sekarang form akan dikirimkan ke register_process.php
  // const registerForm = document.getElementById('registerForm');
  // registerForm.addEventListener('submit', (event) => {
  //   event.preventDefault();
  //   const name = document.getElementById('regName').value; // Ini harusnya regUsername
  //   const email = document.getElementById('regEmail').value;
  //   const password = document.getElementById('regPassword').value;
  //   console.log('Registration Data:', { name, email, password });
  //   alert('Registrasi berhasil! (Data akan dikirim ke server)');
  //   registerForm.reset();
  // });
  </script>
</body>
</html>