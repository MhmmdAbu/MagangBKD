use PDF;

class ReportController extends Controller
{
    public function downloadReport()
    {
        $pdf = PDF::loadView('report');
        return $pdf->download('laporan.pdf');
    }
}
