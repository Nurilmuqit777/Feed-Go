<div>
    <form wire:submit="subscribe" class="mx-auto max-w-2xl" >
        <div class="bg-white flex flex-col gap-2 rounded-2xl border-2 border-gray-200 p-1 transition focus-within:border-green-500 sm:flex-row sm:items-center sm:rounded-full sm:p-1">

            <input
                type="email"
                wire:model="email"
                placeholder="Email"
                class="min-w-0 flex-1 rounded-xl bg-transparent px-4 py-3 text-gray-700 outline-none placeholder:text-gray-400 sm:rounded-full">

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full rounded-xl bg-[#1B601E] px-6 py-3 text-sm font-semibold text-white shadow-md transition duration-300 hover:bg-green-600 disabled:cursor-not-allowed disabled:opacity-70 sm:w-auto sm:rounded-full">
                <div class="flex items-center justify-center gap-2">
                    <span wire:loading.remove>
                        Ikuti FeedGo
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="31" height="31" viewBox="0 0 31 31" fill="none">
                        <path d="M28.0938 15.5C28.0938 8.54498 22.455 2.90625 15.5 2.90625C8.54498 2.90625 2.90625 8.54498 2.90625 15.5C2.90625 22.455 8.54498 28.0938 15.5 28.0938C22.455 28.0938 28.0938 22.455 28.0938 15.5ZM15.2185 21.0316C15.1281 20.942 15.0563 20.8354 15.0071 20.7181C14.958 20.6007 14.9324 20.4748 14.9319 20.3476C14.9314 20.2204 14.956 20.0943 15.0042 19.9765C15.0524 19.8588 15.1234 19.7517 15.213 19.6614L18.3808 16.4688H10.293C10.036 16.4688 9.78963 16.3667 9.60796 16.185C9.42628 16.0033 9.32422 15.7569 9.32422 15.5C9.32422 15.2431 9.42628 14.9967 9.60796 14.815C9.78963 14.6333 10.036 14.5312 10.293 14.5312H18.3808L15.213 11.3386C15.1234 11.2482 15.0525 11.141 15.0043 11.0232C14.9561 10.9054 14.9316 10.7793 14.9321 10.652C14.9327 10.5247 14.9583 10.3987 15.0076 10.2814C15.0568 10.164 15.1287 10.0574 15.2191 9.96783C15.3095 9.87822 15.4166 9.8073 15.5345 9.75911C15.6523 9.71091 15.7784 9.6864 15.9057 9.68696C16.033 9.68752 16.1589 9.71315 16.2763 9.76238C16.3937 9.81161 16.5002 9.88348 16.5898 9.97389L21.3967 14.8176C21.5767 14.9991 21.6778 15.2444 21.6778 15.5C21.6778 15.7556 21.5767 16.0009 21.3967 16.1824L16.5898 21.0261C16.5002 21.1166 16.3936 21.1886 16.2762 21.2379C16.1587 21.2871 16.0327 21.3128 15.9053 21.3133C15.7779 21.3138 15.6517 21.2892 15.5338 21.2408C15.416 21.1925 15.3088 21.1214 15.2185 21.0316Z" fill="#E3B600"/>
                    </svg>
                </div>

                <span wire:loading>
                    Memproses...
                </span>
            </button>

        </div>

        <div class="bg-white rounded-lg text-sm text-gray-500">
            @error('email')
                <p class="mt-2 text-left text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror

            @if (session('subscription_success'))
                <p class="mt-3 text-center text-sm text-green-600">
                    {{ session('subscription_success') }}
                </p>
            @endif

            @if (session('subscription_error'))
                <p class="mt-3 text-center text-sm text-red-500">
                    {{ session('subscription_error') }}
                </p>
            @endif
        </div>
    </form>
</div>
