# BEFORE
def updateGUI():
    updateTime()
    updateTimeDisplay()
    updateScores()
    updateScoreDisplay()
    refreshWindow()
    
# AFTER
def updateState():
    updateTime()
    updateScores()

def updateGUI():
    updateTimeDisplay()
    updateScoreDisplay()
    refreshWindow()