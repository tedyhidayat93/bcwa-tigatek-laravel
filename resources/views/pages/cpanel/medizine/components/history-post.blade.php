<div class="modal fade" id="history-post">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-custom-1">
                <h4 class="modal-title">History Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="timeline timeline-inverse">
                    <?php
                    $logs = json_decode($data->history);

                    // Fungsi untuk membandingkan dua log berdasarkan waktu
                    function compareLogs($log1, $log2) {
                        $datetime1 = strtotime($log1->datetime);
                        $datetime2 = strtotime($log2->datetime);
                        return $datetime1 - $datetime2;
                    }

                    // Mengurutkan logs menggunakan fungsi compareLogs
                    usort($logs, 'compareLogs');
                    $logs = array_reverse($logs);

                    // Group logs by date
                    $groupedLogs = [];
                        foreach ($logs as $log) {
                            $date = date('d F Y', strtotime($log->datetime));
                            $groupedLogs[$date][] = $log;
                        }
                    ?>

                    @foreach ($groupedLogs as $date => $logs)
                        <div class="time-label">
                            <span class="bg-teal">{{ $date }}</span>
                        </div>
                        @foreach ($logs as $log)
                            <div>
                                <i class="fas fa-clock bg-warning"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> {{ date('H:i', strtotime($log->datetime)); }}</span>
                                    {{-- <h3 class="timeline-header"><a href="#">By {{ $log->by }}</a></h3> --}}
                                    <div class="timeline-body">
                                        {{ $log->message }}<br>at <b> {{ date('l, d-F-Y H:i', strtotime($log->datetime)); }}</b>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-light border-0 btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>