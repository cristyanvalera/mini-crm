<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-slate-300 border border-transparent cursor-pointer rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 hover:text-white focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4']) }}>
    {{ $slot }}
</a>
