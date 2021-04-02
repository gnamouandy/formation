@component('mail::message')
# Nouveau produit dur notre plateforme
un nouveau produit a été ajouté sur notre plateforme


Vous trouverez ci-dessous les informations du produit
## Désignation: {{$produit->designation}}
## Prix: {{$produit->prix}}
## Description: 
{{$produit->description}}

@component('mail::button', ['url' => url("/produits/liste")])
Voir le produit
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
