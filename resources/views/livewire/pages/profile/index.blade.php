<div>
  <x-navbar />
  <div class="w-[75%] mx-auto mt-8 border-solid border-2 border-emerald-300 rounded-lg">
    <form class="p-8" wire:submit='updateProfileInformation'>
      <h2 class="text-2xl text-white font-bold ">Profil Update</h2>
      <p class="opacity-50">kamu bisa melakukan perubahan nama dan email</p>
      <div class="flex flex-col text-gray-400 py-2 mt-4">
          <label for="username">Username</label>
          <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="text" name="username" id="username" wire:model='name' value="{{Auth::user()->name}}">
          @error('name')
            <small class="text-red-500 justify-center">{{ $message }}</small>
          @enderror
      </div>
      <div class="flex flex-col text-gray-400 py-2">
          <label for="email">Email</label>
          <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="email" name="email" id="email" wire:submit='email' value="{{Auth::user()->email}}">
          @error('email')
            <small class="text-red-500 justify-center">{{ $message }}</small>
          @enderror
      </div>
      @if (Auth::user()->role == 'pelanggan')
        <div class="flex flex-col text-gray-400 py-2 mt-4">
          <label for="username">Address</label>
          <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="text" name="address" id="address" wire:model='address' value="{{Auth::user()->address}}">
          @error('address')
            <small class="text-red-500 justify-center">{{ $message }}</small>
          @enderror
        </div>
        <div class="flex flex-col text-gray-400 py-2 mt-4">
          <label for="username">Phone Number</label>
          <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="text" name="phone" id="phone" wire:model='phone' value="{{Auth::user()->phone}}">
          @error('phone')
            <small class="text-red-500 justify-center">{{ $message }}</small>
          @enderror
        </div>  
      @endif
    
      <button type="submit" class="btn btn-accent my-5 py-2 shadow-lg text-white font-semibold text-lg" >
          <span wire:loading.remove>Simpan</span>
          <span class="loading loading-spinner loading-md" wire:loading></span>
      </button>
    </form>
  </div>
  <div class="w-[75%] mx-auto mt-8 border-solid border-2 border-emerald-300 rounded-lg">
    <form class="p-8" wire:submit='updateUserPassword'>
      <h2 class="text-2xl text-white font-bold ">Ganti Password</h2>
      <p class="opacity-50">kamu bisa melakukan perubahan password</p>
      <div class="flex flex-col text-gray-400 py-2 mt-2">
          <label for="currentPass">Current Password</label>
          <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="password" name="currentPass" id="currentPass" wire:model='current_password'>
          @error('current_password')
            <small class="text-red-500 justify-center">{{ $message }}</small>
          @enderror
      </div>

      <div class="flex flex-col text-gray-400 py-2 mt-2">
          <label for="newPass">New Password</label>
          <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="password" name="newPass" id="newPass" wire:model='password'>
          @error('password')
            <small class="text-red-500 justify-center">{{ $message }}</small>
          @enderror
      </div>
    
      <div class="flex flex-col text-gray-400 py-2 mt-2">
        <label for="newPass">New Password Confirmation</label>
        <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="password" name="newPass" id="newPass" wire:model='password_confirmation'>
        @error('password_confirmation')
          <small class="text-red-500 justify-center">{{ $message }}</small>
        @enderror
    </div>

      <button type="submit" class="btn btn-accent my-5 py-2 shadow-lg text-white font-semibold text-lg" >
          <span wire:loading.remove>Simpan</span>
          <span class="loading loading-spinner loading-md" wire:loading></span>
      </button>
    </form>
  </div>
  
</div>