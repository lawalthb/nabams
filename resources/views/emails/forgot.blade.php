<x-mail::message>
  # Introduction
Dear member<br />
Your password has been reset
<br />
Your New Password is: {{$new_password}}
  <x-mail::button :url="https://ogitechnabams.com/loginPage">
   Login to continue
  </x-mail::button>

  Thanks,<br>
  {{ config('app.name') }}
</x-mail::message>

