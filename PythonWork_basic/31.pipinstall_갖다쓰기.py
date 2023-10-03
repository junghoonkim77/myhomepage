#다른 사람이 만든 패키지를 이용해 코딩을 하는것도 파이썬은 매우 중요하다.
#구글에서 pypi를 검색한다.
#pip list 라고 터미널에 입력하면 현재 입력된 pip정보가 모두 확인된다.
#pip install --upgrade beautifulsoup4 라고 입력하면 업데이트 설치도 가능하다.
#pip uninstall beautifulsoup4 라고 입력하면 패키치를 삭제도 할수 있다.

from bs4 import BeautifulSoup
soup = BeautifulSoup("<p>Some<b>bad<i>HTML")
print(soup.prettify())