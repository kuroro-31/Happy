const moneyFormat = (num) => {
  return (
    '¥' +
    (num || 0)
      .toString()
      .replace(/^-?\d+/g, (m) => m.replace(/(?=(?!\b)(\d{3})+$)/g, ','))
  )
}

export default (context, inject) => {
  inject('moneyFormat', moneyFormat)
}
