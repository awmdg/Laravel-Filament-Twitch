@php
    $status = isset($status) ? strtolower($status) : '';
    $color = '';

    switch ($status) {
        case 'waiting for approval':
            $color = 'yellow'; // pending
            break;
        case 'accepted post':
            $color = 'green'; // accepted
            break;
        case 'declined post':
            $color = 'red'; // declined
            break;
        default:
            $color = 'black'; // default color
    }
@endphp

<span style="color: {{ $color }}">{{ $status }}</span>
