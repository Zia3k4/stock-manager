
//talvez seja definido em outro lugar, mas aqui está um exemplo básico de um controlador GerenteController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenteController extends Controller
{
    public function index()
    {
        return inertia('Gerente/Index');
    }

    public function create()
    {
        return inertia('Gerente/Create');
    }

    public function edit($id)
    {
        return inertia('Gerente/Edit', ['id' => $id]);
    }
}
