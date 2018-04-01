<!-- Footer Style 4 -->
<footer class="footer-4">
  <!-- text/links wrapper -->
  <div class="container">
    <!-- all navigation links -->
    <div class="row all-links">
      <!-- logo and copyright info -->
      <div class="col-md-3 col-sm-6 col-xs-8">
        <img src="{{ asset('images/logo-text-white.png') }}" width="150" alt="">
        <p class="copyright font-hind">Copyright © Bororo25<br>Todos direitos reservados.</p>
      </div>
      <!-- links -->
      <div class="col-md-3 col-sm-6 col-xs-8">
        <ul>
          <li><a href="{{ route('site.about') }}">Quem somos</a></li>
          <li><a href="{{ route('site.services.livros') }}">O que fazemos</a></li>
          <li><a href="{{ route('site.blog') }}">Blog</a></li>
          <li><a href="{{ route('site.events') }}">Eventos</a></li>
          <li><a href="{{ route('site.contact') }}">Contato</a></li>
        </ul>
      </div>
      <!-- Social Links -->
      <div class="col-md-3 col-sm-6 col-xs-8">
        <div class="social-wide transition">
          <a href="https://www.facebook.com/Bororo25/" target="_blank"><span class="ti-facebook"></span>Facebook</a>
          <a href="https://www.instagram.com/bororo25oficial/" target="_blank"><span class="ti-instagram"></span>Instagram</a>
          <a href="https://www.youtube.com/user/canalbororo" target="_blank"><span class="ti-youtube"></span>Youtube</a>
        </div>
      </div>
      <!-- About info -->
      <div class="col-md-3 col-sm-6 col-xs-8">
        <div class="sign-box just-center">
          <h6 class="text-center text-white font-w600 margin-bot10">Receba nossas novidades!</h6>
          <!-- form -->
          <form method="POST" action="{{ route('site.register_newsletter') }}">
              {{ csrf_field() }}
              <input type="text" maxlength="100" placeholder="Nome" name="name" required>
              <input type="email" maxlength="150" placeholder="E-mail" name="email" required>
              <button type="submit" class="bttn bttn-main-1 bttn-small btn-block bttn5 letter-spacing2">Inscrever</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</footer>