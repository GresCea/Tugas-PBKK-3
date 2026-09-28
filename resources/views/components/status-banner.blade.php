@props(['message', 'tone' => 'success'])

<div class="status-banner status-{{ $tone }}" role="status">
    <span aria-hidden="true">●</span>
    <span>{{ $message }}</span>
</div>