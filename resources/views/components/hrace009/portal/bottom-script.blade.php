<!-- START: Scripts -->
<script src="{{ asset('themes/fik/js/plugins.js') }}"></script>
<script src="{{ asset('themes/fik/js/designesia.js') }}"></script>
<script src="{{ asset('themes/fik/js/custom-marquee.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
        // Record the start time when the script is first executed
        var startTime = performance.now();

        // Event listener for when the page has finished loading
        window.addEventListener('load', function() {
            // Calculate the time elapsed since the start time
            var loadTime = performance.now() - startTime;
            
            // Log the page load time to the console
            $('#loadtimes').html(loadTime.toFixed(2))
            console.log('Page loaded in ' + loadTime.toFixed(2) + ' milliseconds');
        });
</script>

<!-- Add this script after including Bootstrap JS -->
<!-- Modal -->
<div class="modal fade" id="staticBackdropSyarat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Persyaratan Pembuatan Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table text-white table-bordered">
          <tr>
            <td><strong>Kolom</strong></td>
            <td><strong>Aturan</strong></td>
          </tr>
          <tr>
            <td>Username / Name</td>
            <td>
              <ul>
                <li>Wajib diisi</li>
                <li>Terdiri dari huruf dan angka saja , Huruf Kecil</li>
                <li>Panjang minimum: 4</li>
                <li>Panjang maksimum: 12</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>
              <ul>
                <li>Wajib diisi</li>
                <li>Format email yang valid</li>
                <li>Unik , Tidak boleh sama dengan email lain</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>
              <ul>
                <li>Wajib diisi</li>
                <li>Numerik</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Password</td>
            <td>
              <ul>
                <li>Wajib diisi</li>
                <li>Terdiri dari huruf dan angka saja</li>
                <li>Panjang minimum: 6</li>
                <li>Format Hanya Bisa Huruf Kecil dan Angka</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Password Konfirmasi</td>
            <td>
              <ul>
                <li>Wajib diisi</li>
                <li>Cocok dengan kolom Password</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Full Name / Truename</td>
            <td>
              <ul>
                <li>Wajib diisi</li>
                <li>Terdiri dari huruf dan spasi saja (Besar dan Kecil)</li>
              </ul>
            </td>
          </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Faham</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-light shadow-md">
      <div class="modal-header shadow-sm">
        <h5 class="modal-title text-dark" id="staticBackdropLabel">Sign in to your account</h5>

        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('login') }}" method="POST" id="form_register" class="form-border">
        @csrf
        <div class="modal-body padding40">
          <div class="rounded-10">
            <div class="field-set">
              <label class="text-dark">{{ __('auth.form.name') }}</label>
              <input type='text' name='name' id='name' class="form-control" autocomplete="off" placeholder="{{ __('auth.form.name') }}" required>
            </div>
            <div class="field-set">
              <label class="text-dark">{{ __('auth.form.password') }}</label>
              <input type='password' name='password' id='password' class="form-control" autocomplete="off" placeholder="{{ __('auth.form.password') }}" required>
            </div>
            <div class="field-set mt-2">
              <input type="checkbox" checked id="html" name="fav_language" value="HTML">
              <label for="html"><span class="op-5">Remember me</span></label><br>
            </div>
            <div class="spacer-20"></div>
            <div id="submit">
              <input type="submit" name="submit" id="send_message" value="{{
  __('auth.form.login') }}" class="btn-main btn-fullwidth rounded-3 color-2" />
            </div>
          </div>
          <div class="row padding10 text-center grid-2 justify-content-between rounded-10 pt-2">
            <a href="{{ route('password.request') }}" class="btn-sc color-2 col-md-5">{{
  __('auth.form.forgotPassword') }}</a>
            <a href="{{ route('register') }}" class="btn-main color-2 col-md-5">{{
  __('auth.form.register') }}</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- offcanva  -->
<div class="offcanvas offcanvas-end glass " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row">
      <ul class="align-items-center">
        <a class="btn-main btn-fullwidth" href="{{ route('app.dashboard') }}">
          {{ __('general.menu.dashboard') }}
        </a>
        <a class="btn-main btn-fullwidth" href="{{ route('profile.show') }}">
          {{ __('general.dashboard.profile.header') }}
        </a>
        <a class="btn-main btn-fullwidth" href="{{ route('app.donate.history') }}">
          {{ __('general.menu.donate.history') }}
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="btn-main btn-fullwidth text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
            {{ __('general.logout') }}
          </a>
        </form>
      </ul>
    </div>
  </div>
  <div class="mx-auto py-2">PERFECT WORLD 2024</div>
</div>