{{-- // include contact form --}}
<h2 class="text-center">{{ $title ?? 'Contact Us' }}</h2>
<form action="{{ route('contact.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
        @if (isset($errors) && $errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
        @if (isset($errors) && $errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="subject" class="form-control" id="subject" name="subject" required>
        @if (isset($errors) && $errors->has('subject'))
            <div class="text-danger">{{ $errors->first('subject') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        @if (isset($errors) && $errors->has('message'))
            <div class="text-danger">{{ $errors->first('message') }}</div>
        @endif
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </div>
</form>
{{-- // include success message --}}
@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
