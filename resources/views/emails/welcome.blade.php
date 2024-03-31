<x-mail::message>
  # Introduction

  <body>
    <h1>Welcome to our site, {{ $user->firstname }}!</h1>
    <p>Thank you for registering. We're excited to have you as part of our community.</p>
  </body>

  <x-mail::button :url="''">
    Button Text
  </x-mail::button>

  Thanks,<br>
  {{ config('app.name') }}
</x-mail::message>