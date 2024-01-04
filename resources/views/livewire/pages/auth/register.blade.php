<div class="grid grid-cols-1 sm:grid-cols-2 h-screen w-full">
    <div class="hidden sm:block">
        <img class="w-full h-full object-cover" src="https://www.thesoccerstore.co.uk/wp/wp-content/uploads/2021/05/grass-pitch.jpg" alt="pitch">
    </div>

    <div class="bg-gray-800 flex flex-col justify-center">
        <form class="max-w-[400px] w-full mx-auto bg-gray-900 p-8 rounded-lg" wire:submit="register">
            <h2 class="text-4xl dark:text-white font-bold text-center ">Register</h2>
            <div class="flex flex-col text-gray-400 py-2">
                <label for="username">Username</label>
                <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="text" name="username" id="username" wire:model="form.name">
                @error('form.name')
                  <small class="text-red-500 justify-center">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col text-gray-400 py-2">
                <label for="email">Email</label>
                <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="email" name="email" id="email" wire:model="form.email">
                @error('form.email')
                  <small class="text-red-500 justify-center">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col text-gray-400 py-2">
                <label for="password">Password</label>
                <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="password" name="password" id="password" wire:model="form.password">
                @error('form.password')
                  <small class="text-red-500 justify-center">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col text-gray-400 py-2">
                <label>Role</label>
                <select class="select bg-gray-700 mt-2 p-2 w-full" wire:model="form.role" >
                    <option disabled>Select Role</option>
                    <option value="pelanggan">Pelanggan</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <a href="{{route('login')}}" class="hover:text-accent transition" wire:navigate>Sudah Punya Akun?</a>
            <button type="submit" class="btn btn-accent my-5 py-2 w-full shadow-lg text-white font-semibold text-lg" >
                <span wire:loading.remove>Register</span>
                <span class="loading loading-spinner loading-md" wire:loading></span>
            </button>
        </form>
    </div>
</div>