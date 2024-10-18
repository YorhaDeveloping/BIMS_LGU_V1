@can('admin-access')
@extends('layouts.Admin.app')

@section('content')
<div class="container">
    <div class="calendar-container">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">October 2024</h2>
        <div class="calendar">
            <form action="{{ route('admin.calendar.index') }}" method="GET">
                @csrf
                <div class="flex justify-between items-center mb-4">
                    <!-- Previous Month Button -->
                    <button type="submit" name="month" value="{{ $prevMonth->format('Y-m') }}" class="btn-nav">&lt;</button>
                    
                    <!-- Month and Year Selector -->
                    <div class="flex items-center">
                        <select name="month" id="month" class="form-select">
                            @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}" {{ $currentMonth->month == $month ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="year" id="year" class="form-select ml-2">
                            @foreach(range(now()->year - 5, now()->year + 5) as $year)
                                <option value="{{ $year }}" {{ $currentMonth->year == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                        
                        <button type="submit" class="btn-nav ml-2">Go</button>
                    </div>

                    <!-- Next Month Button -->
                    <button type="submit" name="month" value="{{ $nextMonth->format('Y-m') }}" class="btn-nav">&gt;</button>
                </div>
            </form>

            <table class="table-auto w-full text-center">
                <thead>
                    <tr>
                        <th class="day-header">Sun</th>
                        <th class="day-header">Mon</th>
                        <th class="day-header">Tue</th>
                        <th class="day-header">Wed</th>
                        <th class="day-header">Thu</th>
                        <th class="day-header">Fri</th>
                        <th class="day-header">Sat</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $startOfMonth = $currentMonth->copy()->startOfMonth();
                        $endOfMonth = $currentMonth->copy()->endOfMonth();
                        $daysInMonth = $currentMonth->daysInMonth;
                        $dayOfWeek = $startOfMonth->dayOfWeek;
                    @endphp

                    @for ($i = 0; $i < $dayOfWeek; $i++)
                        <td></td>
                    @endfor

                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @if (($dayOfWeek + $day - 1) % 7 == 0 && $day != 1)
                            </tr><tr>
                        @endif
                        <td class="day-cell">
                            <a href="{{ route('calendar.click', ['day' => $day]) }}" class="day-link {{ $day == 10 ? 'active-day' : '' }}">
                                {{ $day }}
                            </a>
                        </td>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@endcan