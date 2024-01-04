<div class="grid grid-cols-1 sm:grid-cols-2 h-screen w-full">
    <div class="hidden sm:block">
        <img class="w-full h-full object-cover" src="https://www.thesoccerstore.co.uk/wp/wp-content/uploads/2021/05/grass-pitch.jpg" alt="pitch">
    </div>

    <div class="bg-gray-800 flex flex-col justify-center">
        <form class="max-w-[400px] w-full mx-auto bg-gray-900 p-8 rounded-lg" wire:submit="login">
            <h2 class="text-4xl dark:text-white font-bold text-center ">LOGIN</h2>
            <div class="flex flex-col text-gray-400 py-2">
                <label for="email">Email</label>
                <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="email" name="email" id="email" wire:model='form.email'>
                @error('form.email')
                <small class="text-red-500 justify-center">{{ $message }}</small>
                @enderror
                @if(flash()->message)
                <small class="text-red-500 justify-center">{{ flash()->message }}</small>
                @endif
            </div>
            <div class="flex flex-col text-gray-400 py-2">
                <label for="password">Password</label>
                <input class="rounded-lg bg-gray-700 mt-2 p-2 focus:border-blue-500 focus:bg-gray-800 focus:outline-none" type="password" name="password" id="password" wire:model="form.password">
                @error('form.password')
                <small class="text-red-500 justify-center">{{ $message }}</small>
                @enderror
            </div>
            <a href="/register" class="hover:text-accent transition" wire:navigate>Belum Punya Akun?</a>
            <button type="submit" class="btn btn-accent my-5 py-2 w-full shadow-lg text-white font-semibold text-lg login-btn">
                <span wire:loading.remove>Login</span>
                <span class="loading loading-spinner loading-md" wire:loading></span>
            </button>
        </form>
    </div>
</div>

