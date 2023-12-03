class Home:

  def __init__(self, hoon, jjoo, jjun, eun):
    self.hoon = hoon
    self.jjoo = jjoo
    self.jjun = jjun
    self.eun = eun

  def charac(self, cha1, cha2, cha3, cha4):
    print('{0}의 성격은 :{1}'.format(self.hoon, cha1))
    print('{0}의 성격은 :{1}'.format(self.jjoo, cha2))
    print('{0}의 성격은 :{1}'.format(self.jjun, cha3))
    print('{0}의 성격은 :{1}'.format(self.eun, cha4))


home = Home('김정훈', '김주남', '김기준', '김기은')
home.charac('개판', '하늘이 내린 성격', '인생최고의 선물', '인생최고의 선물2')


# class Family(Home):

#   def __init__(self, hoon, jjoo, jjun, eun, job1, job2, job3, job4):
#     Home.__init__(self, hoon, jjoo, jjun, eun)

#     self.job1 = job1
#     self.job2 = job2
#     self.job3 = job3
#     self.job4 = job4

#   def jobs(self):
#     print('{0}의 직업은 :{1}'.format(self.hoon, self.job1))
#     print('{0}의 직업은 :{1}'.format(self.jjoo, self.job2))
#     print('{0}의 직업은 :{1}'.format(self.jjun, self.job3))
#     print('{0}의 직업은 :{1}'.format(self.eun, self.job4))


# family = Family('김정훈', '김주남', '김기준', '김기은', '직장인', '가정주부', '남학생', '여학생')

# family.jobs()
# family.charac('불쌍','완전착함','너무착함','너무착함2')


class Home :
  def Family(self):
    print('우리집은 나만 빼고 너무 착하고 좋습니다.그런데 내가 그 사람들을 점점 망치는 기분이 들어 미치겠습니다.')
    

family = Home()
family.Family()
