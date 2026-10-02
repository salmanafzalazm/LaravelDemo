<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
         <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>



    <body>
<nav class="relative bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex shrink-0 items-center">
          <img src="https://azmdigital.sa/images/logo-w.png" alt="Your Company" class="h-8 w-auto" />
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="/" aria-current="page" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">{{__('local.home')}}</a>
            <a href="/product" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{__('local.task')}}</a>
            <a href="{{ route('tasksRouteName')}}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{__('local.projects')}}</a>
            <a href="/setlang/en" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">EN</a>
            <a href="/setlang/ar" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Ar</a>


            {{-- {{ route('tasks.index') }} --}}
          </div>
        </div>
      </div>
    </div>

</nav>
<div>
<h1>Home Page</h1>


<h2>{{__('local.helloUser', ["name"=> "Salman Afzal"])}}</h2>
</div>
    </body>

</html>
