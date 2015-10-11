#!/usr/bin/python
import csv
import json
import sys
import codecs
import numpy as np

# mu = center = num samples / 2
# sig = st dev =
def gaussian(x, mu, sig):
    if x > mu:
      return 2.0 - gaussian(abs(mu-x),mu,sig)
    return np.exp(-np.power(x - mu, 2.) / (2 * np.power(sig, 2.)))

def normalize(midval,points,players,mon):
    retval = [ ]
    points.sort()
    mid = float(len(points))
    c = 0.
    for q in points:
        players[q[1]][mon+'-value'] = gaussian(c/mid, 0.5, 0.4) * midval
        c = c + 1.

def calc_k(k):
  if k > 50:
    return 10
  if k > 40:
    return 8
  if k > 30:
    return 6
  if k > 20:
    return 4
  if k > 10:
    return 2
  return 0

def calc_hw(hw):
  if hw > 50:
    return 0
  if hw > 40:
    return 2
  if hw > 30:
    return 4
  if hw > 20:
    return 6
  if hw > 10:
    return 8
  return 10

def calc_er(er):
  if er > 20:
    return 0
  if er > 15:
    return 3
  if er > 10:
    return 5
  if er > 5:
    return 7
  return 10

x = { }
for fn in sys.argv[1:]:
  points = [ ]
  mon = fn[-6:-4]
  if mon == '14':
      mon = '2014'
  else:
      mon = '2015-' + mon
  with codecs.open(fn, 'rU', encoding='utf-8-sig') as f:
    reader = csv.DictReader(f)
    for r in reader:
      r['type'] = 'pitcher'
      for intify in [ "W","L","G","GS","CG","ShO","SV","HLD","BS","TBF","H","R","ER","HR","BB","IBB","HBP","WP","BK","SO","playerid" ]:
             r[intify] = int(r[intify])
      for floatify in [ "ERA","IP" ]:
             r[floatify] = float(r[floatify])
      # Calculate raw points
      r['points'] = r['IP']*0.33 + r['W']*3 + calc_hw(r['H']+r['W']) + calc_k(r['SO']) + calc_er(r['ER'])
      id = r['playerid']
      q = [r['points'], r['playerid']]
      points.append(q)
      if not x.get( id, False ):
             x[ id ] = { }
             x[ id ]['name'] = r['Name']
             x[ id ]['playerid'] = r['playerid']
      x[ id ][ mon ] = r
  normalize(100.,points,x,mon)

print "db.players.count();"
for id in x:
   print "db.players.insert(%s);" % (json.dumps(x[id],sort_keys=True, indent=4, separators=(',', ': ')))
print "db.players.count();"

