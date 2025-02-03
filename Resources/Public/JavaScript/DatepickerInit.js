import DateTimePicker from '@typo3/backend/date-time-picker.js'

class MassSendStepFive {
  static updateDateTimePickers (selector = '#box-1') {
    document.querySelectorAll(`${selector} .t3js-datetimepicker`
    ).forEach((e => DateTimePicker.initialize(e)))
  }
}

MassSendStepFive.updateDateTimePickers('')
