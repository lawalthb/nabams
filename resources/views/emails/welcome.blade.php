<x-mail::message>
  # Introduction
Hello {{$user->firstname}} <br />
Welcome to National Association of Busines Administration and Management Student (Nabams!) Your payment has been received and processed. We're excited to have you onboard. If you have any questions or need assistance, feel free to reach out to our support team (08091624640, 08161410427)

  <x-mail::button :url="$payment_link">
    Pay for registration
  </x-mail::button>

  Thanks,<br>
  {{ config('app.name') }}
</x-mail::message>

