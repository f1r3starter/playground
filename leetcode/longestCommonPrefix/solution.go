func longestCommonPrefix(strs []string) string {
	pref := "-1"
	for _, str := range strs {
		if pref == "-1" {
			pref = str
		} else if len(pref) > len(str) {
			pref = findCommon(pref, str)
		} else {
			pref = findCommon(str, pref)
		}
	}

	if pref == "-1" {
		return ""
	}

	return pref
}

func findCommon(longer string, shorter string) string {
	common := ""
	for pos, char := range shorter {
		if int(longer[pos]) != int(char) {
			return common
		}

		common += string(char)
	}

	return common
}