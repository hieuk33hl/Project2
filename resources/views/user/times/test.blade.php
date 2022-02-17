@php
use Carbon\Carbon;
use App\Models\Holiday;
// $start = Carbon::now()->setDate(2021, 9, 1);
// $end = Carbon::now()->setDate(2021, 9, 30);
// echo $start;
// echo '<br>';
// echo $end;
// $workingDays = [1, 2, 3, 4, 5];

// // $holidayDays = ['*-09-025', '*-01-01', '*-09-02', '*-09-12'];
// $array = [];
// $query = Holiday::all();
// foreach ($query as $row) {
//     $day = '*-' . $row->date_holiday;
//     $array[] = $day;
// }
// $holidayDays = $array;

// $days = $start->diffInDaysFiltered(function (Carbon $date) use ($workingDays) {
//     return !in_array($date->format('N'), $workingDays);
// }, $end);
// $day2 = $start->diffInDaysFiltered(function (Carbon $date) use ($holidayDays) {
//     return in_array($date->format('*-m-d'), $holidayDays);
// }, $end);
// echo $days + $day2;
//thử cái funtion đã
function holiday($timeString)
{
    $start = $timeString ? Carbon::parse($timeString)->startOfMonth() : Carbon::today()->startOfMonth();
    $month = $start->month;
    echo $month;
    $end = $start->copy()->endOfMonth();
    $workingDays = [1, 2, 3, 4, 5, 6];

    // $holidayDays = ['*-09-025', '*-01-01', '*-09-02', '*-09-12'];
    $array = [];
    $query = Holiday::all();
    foreach ($query as $row) {
        $day = '*-' . $row->date_holiday;
        $array[] = $day;
    }
    $holidayDays = $array;

    $days = $start->diffInDaysFiltered(function (Carbon $date) use ($workingDays) {
        return !in_array($date->format('N'), $workingDays);
    }, $end);
    $day2 = $start->diffInDaysFiltered(function (Carbon $date) use ($holidayDays) {
        return in_array($date->format('*-m-d'), $holidayDays);
    }, $end);
    echo $days - $day2;
}

holiday('2021-09-01');

@endphp
