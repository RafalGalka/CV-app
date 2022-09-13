<div class="form-row">
    <div class="form-group col-md-12">
        <h5>Ilości prób łącznie: {{$protocol->days_28+$protocol->days_56+$strenght_samples+$W_samples+$N_samples+$F_samples}} , pozostało: {{$protocol->days_28+$protocol->days_56+$strenght_samples+$W_samples+$N_samples+$F_samples-$nr}}</h5>
        <h6>Zalecane 150x150x150: {{$protocol->days_28+$protocol->days_56+$strenght_samples+$W_samples}} , pozostało: </h6>
        <h6>Zalecane 100x100x100: {{$F_samples+$N_samples}} , pozostało: </h6>
        <h6>Próbki do badania ściskania: 28d: {{$protocol->days_28}}, Ś56: {{$protocol->days_56}}, inne: {{$strenght_samples}} </h6>
    </div>
</div>
