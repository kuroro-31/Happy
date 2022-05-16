const commna = (num) => {
  return num.toFixed(1)
}

export default (context, inject) => {
  inject('commna', commna)
}
