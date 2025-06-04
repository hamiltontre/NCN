<php?

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model

{

use HasFactory;

protected $fillable = ['name'];

public function groups()

{

return $this->hasMany(Group::class);

}

public function athletes()

{

return $this->hasMany(Athlete::class);

}

}