<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bill extends Model {

	protected $fillable = ['payment_date', 'amount', 'empresa_id', 'obs', 'status'];
	protected $appends = ['color'];


	public function empresa()
	{
		return $this->belongsTo('App\Empresa');
	}

	// Mutator on paymentDate to format before save on bd
	public function setPaymentDateAttribute($value)
	{
		$date = explode('/', $value);

		$this->attributes['payment_date'] = Carbon::createFromDate($date[2],$date[1],$date[0])->toDateString();
	}

	// Accessor on paymentDate to format before send to controller
	public function getPaymentDateAttribute($value)
	{
		return Carbon::parse($value)->format("d/m/Y");
	}

	
	// Mutator: altera o valor do campo status quando int 1 para string Pago
	public function getStatusAttribute($value)
	{
		if($value == 1)
		{
			$paidDate = date("d/m/Y",strtotime($this->paid_date));

			return "Pago ".$paidDate;
		}else{
			return "";
		}
	}
	
	/*
	*	retorna a cor conforme a diferença de payment_date com  now()
	*/
	public function getColorAttribute()
	{
    	

    	$carbon = new Carbon();
    	$today = $carbon->today();

    	$dateFormat = str_replace("/", "-", $this->payment_date);
    	$datePeace  = explode("-", $dateFormat);
    	$date = $carbon->createFromDate($datePeace[2],$datePeace[1],$datePeace[0],'America/Sao_Paulo');

    	$diff = Carbon::createFromDate($datePeace[2],$datePeace[1],$datePeace[0])->diffInDays(Carbon::now(),false);

    	// getStatusAttribute() manipulou $this->status. Se for vazio nao tem data de pagamento pega as cores
    	if(empty($this->status))
    	{
    		if($diff > 0)
			{
				$color = "danger"; // pagamentos atrasados
			}elseif ($diff == 0) {
				$color = "success"; // pagamentos do dia
			}else{
				$color = "default"; 
			}	
    	}else{
    		$color = "default";
    	}
    		

		return $color;
	}


}
