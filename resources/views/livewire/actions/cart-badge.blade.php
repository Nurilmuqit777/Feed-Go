<div
    x-data="{ bounce:false }"

    x-on:cart-updated.window="
        bounce=true;
        setTimeout(()=>bounce=false,400)
    "

    class="relative"
>

    <a
        href="{{ route('user.cart') }}"
        class="inline-flex items-center gap-2 text-white font-semibold hover:text-yellow-300"
    >

        <div class="relative">

            <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 34 34" fill="currentColor">
                <path d="M10 26.6667C8.16667 26.6667 6.68333 28.1667 6.68333 30C6.68333 31.8333 8.16667 33.3333 10 33.3333C11.8333 33.3333 13.3333 31.8333 13.3333 30C13.3333 28.1667 11.8333 26.6667 10 26.6667ZM0 0V3.33333H3.33333L9.33333 15.9833L7.08333 20.0667C6.81667 20.5333 6.66667 21.0833 6.66667 21.6667C6.66667 23.5 8.16667 25 10 25H30V21.6667H10.7C10.4667 21.6667 10.2833 21.4833 10.2833 21.25L10.3333 21.05L11.8333 18.3333H24.25C25.5 18.3333 26.6 17.65 27.1667 16.6167L33.1333 5.8C33.2667 5.56667 33.3333 5.28333 33.3333 5C33.3333 4.08333 32.5833 3.33333 31.6667 3.33333H7.01667L5.45 0H0ZM26.6667 26.6667C24.8333 26.6667 23.35 28.1667 23.35 30C23.35 31.8333 24.8333 33.3333 26.6667 33.3333C28.5 33.3333 30 31.8333 30 30C30 28.1667 28.5 26.6667 26.6667 26.6667Z"/>
            </svg>

            @if($count)

                <span

                    :class="bounce
                        ? 'scale-125'
                        : 'scale-100'"

                    class="absolute
                           -top-2
                           -right-2
                           bg-red-500
                           text-white
                           text-[10px]
                           font-bold
                           rounded-full
                           min-w-5
                           h-5
                           flex
                           items-center
                           justify-center
                           transition-transform
                           duration-300">

                    {{ $count }}

                </span>

            @endif

        </div>

        Keranjang

    </a>

</div>
