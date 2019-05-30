import React from "react";
import { Field } from "formik";
import PropTypes from "prop-types";

const CheckboxList = ({ values, terms, name }) => {
  return (
    <ul className="inputList">
      {terms.map(term => {
        return (
          <li key={term.term_id}>
            <Field name={`${name}.${term.slug}`}>
              {({ field, form }) => (
                <label
                  className="checkbox-wrapper"
                  htmlFor={`${name}-${term.slug}`}>
                  <input
                    type="checkbox"
                    id={`${name}-${term.slug}`}
                    checked={values[name].includes(term.slug)}
                    onChange={() => {
                      if (values[name].includes(term.slug)) {
                        const nextValue = values[name].filter(
                          value => value !== term.slug
                        );
                        form.setFieldValue(name, nextValue);
                      } else {
                        const nextValue = values[name].concat(term.slug);
                        form.setFieldValue(name, nextValue);
                      }
                    }}
                  />
                  {term.name}
                </label>
              )}
            </Field>
          </li>
        );
      })}
      {/* <pre>{JSON.stringify(values[name], null, 2)}</pre> */}
    </ul>
  );
};

CheckboxList.propTypes = {
  name: PropTypes.string.isRequired,
  terms: PropTypes.array.isRequired,
  values: PropTypes.object.isRequired
};

export default CheckboxList;
