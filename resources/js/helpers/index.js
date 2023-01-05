export const formatPrice = (price) => {
    return new Intl.NumberFormat('fr-FR',{style:'currency', currency: 'EUR'}).format(price/100)
}