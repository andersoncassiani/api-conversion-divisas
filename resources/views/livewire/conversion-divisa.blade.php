<div>

    <div class="input-group">
        <label for="amount">Amount</label>
        <input wire:model='amount' type="number" class="form-control">
    </div>
    <div class="input-group">
        <label for="from">From</label>
        <select name="from" id="from" wire:model='from'>
            <option value="">Seleccionar</option>
            @foreach ($divisas as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
            @endforeach
        </select>
        {{-- <input wire:model='from' type="text" class="form-control"> --}}
    </div>
    <div class="input-group">
        <label for="to">To</label>
        <select name="to" id="to" wire:model='to'>
            <option value="">Seleccionar</option>
            @foreach ($divisas as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <p>Valor Inicial: {{$amount}}</p>
    <p> Resultado: {{$resultConversionAmount}}</p>
    <button wire:click='getConversion()'>
        Action
    </button>
</div>