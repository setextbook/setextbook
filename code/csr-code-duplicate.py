# BEFORE
def updateLevelOfAlarm(npc):
    if (npc.isWalking() && npc.isAlive() && npc.isFriendly())
        setLevelOfAlarm(0)
    else
        setLevelOfAlarm(500)
        react(npc)
        
def react(npc):
    if (npc.isWalking() && npc.isAlive() && npc.isFriendly())
        keepWalking()
    else
        runAway()
        
# AFTER
def react(npc):
    if (npc.isHarmless())
        setLevelOfAlarm(0)
        keepWalking()
    else
        setLevelOfAlarm(500)
        runAway()

def setLevelOfAlarm(level):
    alarmLevel = level
        
def isHarmless(npc):
    return (npc.isWalking() && npc.isAlive() && npc.isFriendly())