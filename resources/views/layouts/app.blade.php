<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <header>
                    @include('layouts.header')
                    <!-- Page Heading -->
                <div class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </div>
            </header>

            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

             <!-- Page Footer -->
            </div>
            <footer>
               @include('layouts.footer')
           </footer>

    </body>
</html>

