namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilTokoController extends Controller
{
    public function index()
    {
        return view('profil_toko'); 
    }
}