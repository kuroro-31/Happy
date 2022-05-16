const numberFormat = (num) => {
  return num.toLocaleString()
}

export default (context, inject) => {
  inject('numberFormat', numberFormat)
}
