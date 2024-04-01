<x-mail::message>
  # Introduction

  Welcome to association name {{$user->firstname}}

  <x-mail::button :url="$payment_link">
    Pay for registration
  </x-mail::button>

  Thanks,<br>
  {{ config('app.name') }}
</x-mail::message>