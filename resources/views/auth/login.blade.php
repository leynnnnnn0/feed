<x-auth-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <x-form-label for="email ">Email</x-form-label>
                    <x-form-input
                        id="email"
                        name="email"
                        type="email"
                        autocomplete="email"/>
                </div>
                <div>
                    <x-form-label for="password ">Password</x-form-label>
                    <x-form-input
                        id="password"
                        name="password"
                        type="password"/>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Doesn't have an account?
                <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register here</a>
            </p>
        </div>
    </div>
</x-auth-layout>