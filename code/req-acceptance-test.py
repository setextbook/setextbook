def test_go_to_time():
  # given
  assert os.isWindows(),"Not Windows!"
  player.open()
  player.play_video('test.mkv')

  # when
  user.send_keyboard_shortcut("Ctrl-T")

  # then
  assert player.screen.is_showing(GOTOTIME)