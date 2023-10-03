import travel.thailand  #모듈이나 패키지만 import가능하고 클래스등은 바로 가져올수 없다.
#예를 들어 thailand까지는 불러올수 있지만 그뒤에 클래스 명을 바로 import하면 에러가 발생된다.
trip_to = travel.thailand.ThailandPackage()
trip_to.detail()

# from travel import vietnam
# trip_to =vietnam.VietnamPackage()
# trip_to.detail()

from travel import *
trip_to = vietnam.VietnamPackage() 
trip_to1 = thailand.ThailandPackage()
trip_to.detail()
trip_to1.detail()
## 위에선 에러가 난다 . 왜냐 개발자가 공개하고 싶은 부분만 공개하게 되는거라서 .
# 그렇게 하기 위해선 __init__.py라는 파일을 이용해 공개 범위 설정을 해야 한다 . __all__ = ['vietnam']


#모듈의 경로를 알아 내는 방법 
# import inspect
# import random
# print(inspect.getfile(random))

# print(inspect.getfile(thailand))

# import sys
# sys.path.append('..')



from python_moduletest import hoon
fam1 = hoon.Father('모지리병신','47세ㅠㅠ')
fam1.father()
fam1.father1()
#library폴더에 내가 만든 패키지를 이동하니깐 폴더 상관없이 이용이 되고 있다.