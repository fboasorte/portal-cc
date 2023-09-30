<!DOCTYPE html>
<html lang="pt-BR">

<div class="custom-container">
  <button class="openbtn" onclick="nav()"><i class="fa-solid fa-bars"></i></button>
  <div>
      <div>
        <i class="{{ $iconClass }} fa-2x"></i>
          <h3 class="smaller-font">{{ $title }}</h3>
      </div>
  </div>
  <!-- Settings Dropdown -->
<div class="dropdown">
  <x-dropdown align="center" width="48">
    <x-slot name="trigger">
      <button class="btn btn-primary ml-2" style="margin-right: 10px; ">
          <div class="d-flex align-items-center">
              <div>{{ Auth::user()->name }}</div>
              <div class="ml-1 align-middle">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
              </div>
          </div>
      </button>
  </x-slot>

  <x-slot name="content">
    <x-dropdown-link style="color: black" :href="route('profile.edit')" 
        onmouseover="this.style.color='white'; this.style.backgroundColor='#2e3e6d';"
        onmouseout="this.style.color='black'; this.style.backgroundColor='white';">
        {{ __('Profile') }}
    </x-dropdown-link>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link style="color: black;"
                :href="route('logout')"
                onclick="event.preventDefault();
                          this.closest('form').submit();"
                onmouseover="this.style.color='white'; this.style.backgroundColor='#2e3e6d';"
                onmouseout="this.style.color='black'; this.style.backgroundColor='white';">
    {{ __('Log Out') }}
</x-dropdown-link>

          </form>
      </x-slot>
  </x-dropdown>
</div>
{{-- Sidebar --}}
</div>
<div id="mySidebar" class="sidebar">
  
  <x-nav-link :href="route('banca.index')" :active="request()->routeIs('banca')">
    {{ __('Banca') }}
  </x-nav-link>
  <x-nav-link :href="route('professor.index')" :active="request()->routeIs('professor')">
    {{ __('Professor') }}
  </x-nav-link>
  <x-nav-link :href="route('postagem.index')" :active="request()->routeIs('postagem')">
    {{ __('Postagem') }}
  </x-nav-link>
  <x-nav-link :href="route('projeto.index')" :active="request()->routeIs('projeto')">
    {{ __('Projeto') }}
  </x-nav-link>
  <x-nav-link :href="route('tcc.index')" :active="request()->routeIs('tcc')">
    {{ __('Tcc') }}
  </x-nav-link>


  
</div>


  
<script>
  /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
  let status = false;

function nav(){

  let value = status ? '0' : '250px';
  document.getElementById("mySidebar").style.width = value;
  document.getElementById("main").style.marginLeft = value;
  status = !status;
}


</script>

</html>
